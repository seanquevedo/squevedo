
//VARIABLES
var selectedWord = ""; 
var selectedHint = "";
var board = []; //array (your letters of each word)
//var board = new Array;   older version
var remainingGuesses = 6;
// var words = ["snake", "monkey", "beetle", "dog", "yeri", "sean", "kianerz"];
var words = [{word: "snake", hint: "It's a reptile"},
             {word: "monkey", hint: "It's a mammal"},
             {word: "beetle", hint: "It's an insect"} ];
var randomInt = 0;
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];


//LISTENERS
window.onload = startGame();  //make sure the page is loaded before playing the game

$("#letterBtn").click( function(){ 

 alert( $("#letterBox").val() ); 
 
} );

$(".letter").click(function(){
       checkLetter($(this).attr("id"));     //anonymous function "this" refers to the button that called it
});


//FUNCTIONS
//start the game
function startGame() {
    pickWord();
    initBoard();
    updateBoard();
    createLetters();
}

//Fill the board with underscores 
function initBoard() {
    for (var letter in selectedWord) {     //"for every letter at index i" (in means index)
        board.push("_");
    }
    
    // for( var i = 0; i < selectedWords.length; ++i) {        OLD SCHOOL FOR LOOP
    //     board.push("_");
    // }
    console.log(board);
}

//Choose a random word and put it into selectedWord
function pickWord() {
    randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
    console.log(selectedHint);
    console.log(selectedWord);
    
}

//Update the current board and updating the current word
function updateWord(positions, letter) {
    for (var pos of positions) {
        board[pos] = letter;
    }
    
    updateBoard();
}

function updateBoard() {
    
    $("#word").empty();
    
    for(var i = 0; i < board.length; ++i) {
        $("#word").append(board[i] + " ");
    }
    // for (var letter of board) {       //OF accesses each element in the array
    // document.getElementById("word").innerHTML += letter + " ";    //how to access html in a certain tag w/ ID
    // }
    $("#word").append("<br />");
    $("#word").append("<span class = 'hint'>Hint: " + selectedHint + "</span>");
}

function createLetters() {
    //grab the letters in alphabet array and create a button into the letters tag!
    for(var letter of alphabet) {
        $("#letters").append("<button class= 'letter' id='" + letter + "'>" + letter + "</button>");
    }
    
}

function checkLetter(letter) {
    //Checks to see if the selected letter is in the word with a for loop
    var positions = new Array();     //marks the indices where the letter is found!
    
    //Put all the positions the letter exists in an array
    for(var i = 0; i < selectedWord.length; ++i) {
        //console.log(selectedWord);
        if(letter == selectedWord[i]) {
            positions.push(i);    //updates pos with an index in the word where the letter matches
        }
    }
    
    if (positions.length > 0) {
        updateWord(positions, letter);
        
        //Check to see if this is a winning guess
        if(!board.includes("_")) {
            endGame(true);
        }
    } else {
        remainingGuesses -= 1;
    } 
    
    if(remainingGuesses <= 0) {
        endGame(false);
    }
}

function updateMan() {
    $("hanging").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

function endGame(win) {
    $("#letters").hide();
    
    if(win) {
        $("#won").show();
    } else {
        $("#lost").show();
    }
}

$(".replayBtn").on("click", function() {
    location.reload();
})

//Disables the button and changes the style to show it's disabled
function disableButton(btn) {
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}
//STOPPED AT STEP 5.2




// var func = function()...
//TEST
// $("#letterBtn").click(function(){           //$("#letterBtn") returns a JQuery Obj. click() binds an event. we created an anon function
//     var boxVal = $("#letterBox").val();
//     console.log("You pressed the button and it had the value: " + boxVal);
// })

//console.log(words[randomInt]);        //HOW TO DEBUG --- use console, you see this refresh the page then right click inspect
//alert(words[0]);             ANOTHER WAY TO DEBUG! It shows an alert msg
