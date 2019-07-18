const data = [
    {
        name: "Rajat Agarwal",
        username: "@Zomato",
        img: "https://b.zmtcdn.com/images/logo/zomato_flat_bg_logo.svg",
        post: "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam numquam officia quia quam"
    },
    {
        name: "Rajat A",
        username: "@Zomato",
        img: "https://b.zmtcdn.com/images/logo/zomato_flat_bg_logo.svg",
        post: "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam numquam officia quia quam"
    }
];

function getTweetsHTML(post){
    return `
    <div class="card">
        <div class="card-img">
            <img src=${post.img} alt="zomato-logo">
        </div>
        <div class="info">
            <div>
            <p>${post.name}</p>
            <p>${post.username}</p>
            <p>${post.post}</p>
            </div>
        </div>
    </div> 
    `
}

function displayTweets(){
    let cardHTML = '';
    const cardsParent = document.getElementsByClassName('card-wrapper');
    data.forEach(function(post){
        cardHTML += getTweetsHTML(post);
    });
    console.log(cardHTML);
    cardsParent[0].innerHTML = cardHTML;
}

//this is closure
// function shareTweet(){
//     let counter = 0;
//     return function(){
//         if(counter == 2){
//             alert("Already shared two times");
//             return;
//         }
//         counter++;
//         alert("Shared");
//     }
// }

// const x = shareTweet();
// x();
// x();



displayTweets();