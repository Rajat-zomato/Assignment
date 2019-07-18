package main

import (
	"context"
	"log"
	"net"

	"google.golang.org/grpc"
	pb "google.golang.org/grpc/projectZomato/proto"

	"database/sql"

	_ "github.com/go-sql-driver/mysql"
)

const (
	port = ":50051"
)

type server struct{}

// vvar restaurant pb.Restaurant

// var restaurant pb.Restaurant

func (s *server) GetRes(ctx context.Context, in *pb.RequestOne) (*pb.Restaurant, error) {
	log.Printf("Received Request for restaurants %v", in.Name)
	con, err := sql.Open("mysql", "root:@tcp(127.0.0.1:3306)/restaurant")
	if err != nil {
		panic(err.Error())
	}
	defer con.Close()
	// log.Printf("db connected")
	results, err := con.Query("SELECT * FROM RestaurantInfotable WHERE NAME=? ", in.Name)
	var restaurantObj pb.Restaurant
	for results.Next() {
		err = results.Scan(&restaurantObj.Name,
			&restaurantObj.Rating,
			&restaurantObj.Cuisines,
			&restaurantObj.Address,
			&restaurantObj.CFT)
		// log.Printf(restaurantObj.Name)
		if err != nil {
			panic(err.Error()) // proper error handling instead of panic in your app
		}
	}
	return &restaurantObj, nil
	// return &pb.Restaurant{Name: "Biryani Blue", Rating: 4.2,
	// 	Cuisines: "North indian", Address: "Gurgaon", CFT: 500}, nil
}

func (s *server) GetAllRes(ctx context.Context, in *pb.RequestAll) (*pb.ResponseAllRes, error) {
	log.Printf("Received for all restaurant")
	con, err := sql.Open("mysql", "root:@tcp(127.0.0.1:3306)/restaurant")
	if err != nil {
		panic(err.Error())
	}
	defer con.Close()
	// log.Printf("db connected")
	results, err := con.Query("SELECT * FROM RestaurantInfotable")
	// log.Printf(results)
	var resAllm pb.ResponseAllRes
	var restaurantObj pb.Restaurant
	for results.Next() {
		err = results.Scan(&restaurantObj.Name,
			&restaurantObj.Rating,
			&restaurantObj.Cuisines,
			&restaurantObj.Address,
			&restaurantObj.CFT)
		// log.Printf(restaurantObj.Name)
		if err != nil {
			panic(err.Error()) // proper error handling instead of panic in your app
		}
		resAllm.ResList = append(resAllm.ResList, &restaurantObj)
	}

	return &resAllm, nil

}

func (s *server) EditRes(ctx context.Context, in *pb.Restaurant) (*pb.Nresponse, error) {
	log.Printf("Received to edit : %v", in.Name)
	con, err := sql.Open("mysql", "root:@tcp(127.0.0.1:3306)/restaurant")
	if err != nil {
		panic(err.Error())
	}
	defer con.Close()
	add, err := con.Prepare("UPDATE RestaurantInfotable SET Rating = ?, Cuisines = ?, Address = ?, CFT = ? WHERE Name = ?")

	add.Exec(
		in.Rating, in.Cuisines, in.Address, in.CFT, in.Name,
	)
	return &pb.Nresponse{}, nil
}

func (s *server) AddRes(ctx context.Context, in *pb.Restaurant) (*pb.Nresponse, error) {
	log.Printf("Received to add restaurant: %v", in.Name)

	con, err := sql.Open("mysql", "root:@tcp(127.0.0.1:3306)/restaurant")
	if err != nil {
		panic(err.Error())
	}
	defer con.Close()
	add, err := con.Prepare("INSERT INTO RestaurantInfotable VALUES (?, ?, ?, ?, ?)")

	add.Exec(
		in.Name,
		in.Rating, in.Cuisines, in.Address, in.CFT,
	)

	return &pb.Nresponse{}, nil
}

func main() {

	lis, err := net.Listen("tcp", port)
	if err != nil {
		log.Fatalf("failed to listen: %v", err)
	}
	s := grpc.NewServer()

	log.Printf("new server created")

	pb.RegisterZomatoServiceServer(s, &server{})

	log.Printf("service registered")

	if err := s.Serve(lis); err != nil {
		log.Fatalf("failed to serve: %v", err)
	}

}
