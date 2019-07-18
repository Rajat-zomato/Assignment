//
//  RestaurantModel.swift
//  MYZOMATOAPP
//
//  Created by Zomato on 7/11/19.
//  Copyright © 2019 Zomato. All rights reserved.
//

import UIKit

struct User{
    var name : String?
    var email : String?
    
    init(name : String, email : String) {
        self.name = name
        self.email = email
    }
    init(){

    }
    
    
    func getUserWithObject(object:[String:Any])-> User{
        var user = User()
        
        if let name = object["name"] as? String{
            user.name = name
        }
        if let email = object["email"] as? String{
            user.email = email
        }
        return user
    }

}




class Users : NSObject{
    var usersArray : [User] = []
    var data : Data = Data()
    override init(){
      super.init()
    }

    func getData(urlString: String, completionHandler : @escaping ([User])->()) {
        var users:[User] = []
        if let url = URL(string: urlString) {
            let dataTask = URLSession.shared.dataTask(with: url) {(data, response, error) in
                guard let data = data else { return }
                let jsonData = self.convertToDictionary(data: data)
                guard let parsedJsonData = jsonData else {return}
                
                for object in parsedJsonData{
                    let user = User()
                    users.append(user.getUserWithObject(object: object))
                }
                completionHandler(users)
//                self.usersArray = users
//                print(jsonData)
//                print(String(data: data, encoding: .utf8)!)
            }
            dataTask.resume()
        }
    }
    
    func convertToDictionary(data: Data?) -> [[String: Any]]? {
        guard let data = data else { return nil }
        
        do {
            return try JSONSerialization.jsonObject(with: data, options: []) as? [[String: Any]]
        } catch {
            print(error.localizedDescription)
        }
        return nil
    }
    
    
    
    func getImage(urlString: String, completionHandler : @escaping (Data)->()) {
        if let url = URL(string: urlString) {
            let dataTask = URLSession.shared.dataTask(with: url) {(data, response, error) in
                guard let data = data else { return }
                completionHandler(data)
            }
            dataTask.resume()
        }
    }
    
}



