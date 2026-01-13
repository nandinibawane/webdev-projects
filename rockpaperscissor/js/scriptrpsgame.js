

let userscore=0;
let compscore=0;


const userscorepara=document.querySelector("#user-score");
const compscorepara=document.querySelector("#comp-score");
const choices=document.querySelectorAll(".choice");
const msg=document.querySelector("#msg");
choices.forEach((choice) => {

    choice.addEventListener("click",() => {
        const userchoice=choice.getAttribute("id");
        console.log("choice was clicked",userchoice);
        playgame(userchoice);

    });
});


const drawGame=()=>{
    console.log("Game was Draw!!");
    msg.innerText=("Game was draw ! Play again");
    msg.style.backgroundColor="yellow";

    
};


const playgame =((userchoice)=>{
    console.log("user choice:",userchoice);

    const compchoice=getcompchoice();
    console.log(" comp choice:",compchoice);

    if (userchoice === compchoice){
        drawGame();
    }else{

        let userwin=true;
        if (userchoice==="rock"){
            //paper,scissor
            userwin= compchoice==="paper"? false:true;


        }else if(userchoice === "paper"){
            //rock,scissor
            userwin= compchoice === "scissor"? false:true;

        }
        else{
            //scissor,rock
             userwin= compchoice==="rock"? false:true;


        }

        showwinner(userwin,userchoice,compchoice);
    }
    

});

const showwinner=((userwin,userchoice,compchoice)=>{
    if (userwin)
    {
        console.log("Congrats! You win");


        msg.innerText=`You win ! ${userchoice} beats ${compchoice}`;
        msg.style.backgroundColor="green";
        userscore++;
        userscorepara.innerText=userscore;

    }else{
        console.log("You lose!");
        msg.innerText=`You lose ! ${compchoice} beats your ${userchoice}`;
        msg.style.backgroundColor="red";
        compscore++;
        compscorepara.innerText=compscore;
    }

})
//to get random no btwn 0-n(0,1,2) ,multiply no by n+1(3),you will get in range no.s only
//Math.floor() return the first digit of decimal no
//Math.random to generate random nos which we will use for index



const getcompchoice=()=>{
    const options=["rock","paper","scissor"];
    const randidx=Math.floor(Math.random() * 3);
    return options[randidx];

};