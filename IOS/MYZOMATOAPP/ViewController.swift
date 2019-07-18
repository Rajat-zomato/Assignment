//
//  ViewController.swift
//  MYZOMATOAPP
//
//  Created by Zomato on 7/11/19.
//  Copyright © 2019 Zomato. All rights reserved.
//

import UIKit

class ViewController: UIViewController, UITableViewDelegate, UITableViewDataSource {
    private let reuseID: String = "mycell"
    private let reuseID2: String = "2"
    let tableView = UITableView(frame: .zero)
    var arrayOfUsers : [User] = []
    var data : Data = Data()
    
    override func viewDidLoad() {
        super.viewDidLoad()
        let user = Users()
        
        user.getData(urlString:
            "https://jsonplaceholder.typicode.com/users"){ (users) in
            self.arrayOfUsers = users
            DispatchQueue.main.async{
                self.tableView.reloadData()
            }
            
        }
        
        user.getImage(urlString: "https://static-news.moneycontrol.com/static-mcnews/2019/02/Zomato_company_logo-770x433.jpg"){ (data) in
            self.data = data
            DispatchQueue.main.async{
                self.tableView.reloadData()
            }
            
        }
        createList()
    }

    func createList(){
        
        view.addSubview(tableView)
        tableView.set(.fillSuperView(view))
        tableView.dataSource = self
        tableView.delegate = self
        tableView.register(MyTableViewCell.self, forCellReuseIdentifier: reuseID)
        tableView.register(MyCell2.self, forCellReuseIdentifier: reuseID2)
        tableView.register(UITableViewCell.self, forCellReuseIdentifier: "empty")
    }
    
    func numberOfSections(in tableView: UITableView) -> Int {
        return 2
    }
    
    func tableView(_ tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        
        switch section {
        case 0:
            return arrayOfUsers.count
        case 1:
            return arrayOfUsers.count - 5
        default:
            return 0
        }
    }
    
    func tableView(_ tableView: UITableView, cellForRowAt indexPath: IndexPath) -> UITableViewCell {
        
        switch indexPath.section {
        case 0:
            let cell = tableView.dequeueReusableCell(withIdentifier: reuseID, for: indexPath) as! MyTableViewCell
            cell.setData(user: arrayOfUsers[indexPath.row],data : data )
            return cell
            
        case 1:
            let cell = tableView.dequeueReusableCell(withIdentifier: reuseID2, for: indexPath) as! MyCell2
            cell.setData(user: arrayOfUsers[indexPath.row])
            return cell
        default:
            return UITableViewCell(style: .default, reuseIdentifier: "empty")
        }
    }
    
    func tableView(_ tableView: UITableView, didSelectRowAt indexPath: IndexPath) {
        print(arrayOfUsers[indexPath.row].name)
    }
    
    func createView(){
        let redView = UIView()
        redView.backgroundColor = .red
        view.addSubview(redView)
        redView.set(.top(view, 50),
                    .sameLeadingTrailing(view, 12),
                    .height(200))
        
        
        let yellowView = UIView()
        yellowView.backgroundColor = .yellow
        view.addSubview(yellowView)
        yellowView.set(.below(redView, 12),
                       .leading(view, 12),
                       .width(30),
                       .height(100))
        
        let greenView = UIView()
        greenView.backgroundColor = .green
        view.addSubview(greenView)
        greenView.set(.after(yellowView, 12),
                      .below(redView, 12),
                      .trailing(view, 12),
                      .height(100))
        
        let blueView = UIView()
        blueView.backgroundColor = .blue
        view.addSubview(blueView)
        blueView.set(.below(greenView, 12),
                     .trailing(view, 12),
                     .width(30),
                     .height(100))
        
        let orangeView = UIView()
        orangeView.backgroundColor = .orange
        view.addSubview(orangeView)
        orangeView.set(.below(greenView, 12),
                     .leading(view, 12),
                     .before(blueView, 12),
                     .height(100))
        
        
        
        
        
        
    }
    

}

