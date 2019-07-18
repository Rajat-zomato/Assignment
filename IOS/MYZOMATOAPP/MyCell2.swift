//
//  MyTableViewCell.swift
//  MYZOMATOAPP
//
//  Created by Zomato on 7/11/19.
//  Copyright © 2019 Zomato. All rights reserved.
//

import UIKit

class MyCell2: UITableViewCell {
    
    let titleLabel = UILabel()
    let subtitleLabel = UILabel()
    let mainImageView = UIImageView()
    
    override init(style: UITableViewCell.CellStyle, reuseIdentifier: String?) {
        super.init(style: style, reuseIdentifier: reuseIdentifier)
        createViews()
        selectionStyle = .none
    }
    
    required init?(coder aDecoder: NSCoder) {
        fatalError("init(coder:) has not been implemented")
    }
    
    func createViews(){
        contentView.addSubview(mainImageView)
        mainImageView.layer.cornerRadius = 20
        mainImageView.set(.top(contentView, 12),
                          .leading(contentView, 12),
                          .width(40),
                          .height(40),
                          .bottom(contentView, 12))
        
        contentView.addSubview(titleLabel)
        titleLabel.set(.top(mainImageView),
                       .after(mainImageView, 12),
                       .trailing(contentView, 12))
        
        contentView.addSubview(subtitleLabel)
        subtitleLabel.set(.below(titleLabel, 2),
                          .after(mainImageView, 12),
                          .trailing(contentView, 12))
    }
    
    public func setData(user : User){
        mainImageView.backgroundColor = .green
        titleLabel.text = user.name
        subtitleLabel.text = user.email
    }
    
}
