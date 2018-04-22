//VARIABLES
             var selectedWord = "";
             var selectedHint = "";
             var board = []; //array
             //var board = new Array;
             var remainingGuesses = 6;
             var words = ["snake", "monkey", "beetle", "horse", "dog"];
             var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                
             var words = [{word: "snake", hint: "It's a reptile"},
                {word: "monkey", hint: "It's a mammal"},
                {word: "beetle", hint: "It's an insect"} ];  
                
             var hintButton = document.createElement("hint");
             hintButton.innerHTML = "Hint!";
             
             //EVENTS
             window.onload = startGame();
             
             $("#letterBtn").click( function(){ 
               
                 alert( $("#letterBox").val() ); 
                 
             } );
             
             $(".letter").click(function(){
                   checkLetter($(this).attr("id"));     //anonymous function "this" refers to the button that called it
                   disableButton($(this));
                 
             });
             //document.getElementById("letterBtn")
             
             
             function startGame() {
                 
                 pickWord();
                 initBoard();
                 updateBoard();
                 createLetters();
                 
             }
             
             //alert(words[0]);
             //console.log(words[0]);
             
             function pickWord() {
                var randomInt = Math.floor(Math.random() * words.length );
                selectedWord = words[randomInt].word.toUpperCase();
                selectedHint = words[randomInt].hint;
                console.log(selectedWord);
             }
             
             function createLetters() {
                 //grab the letters in alphabet array and create a button into the letters tag!
                for(var letter of alphabet) {
                     $("#letters").append("<button class= 'letter btn btn-success' id='" + letter + "' >" + letter + "</button>");
                     //document.getElementById(letter).style.background = ("#00FF00");
                }
    
            }
            //  for (var i=0; i < selectedWord.length; i++) {
            //      board.push("_");
            //  }
             
             function initBoard() {
                 for (var letters in selectedWord) {
                     board.push("_");
                 }
             
                 console.log(board);
             }
             
             
             function updateBoard() {
                 $("#word").empty();
                //  for (var letter of board) {
    
                //     document.getElementById("word").innerHTML += letter + " ";
                     
                //  }
                 
                 for(var i = 0; i < board.length; ++i) {
                 
                    $("#word").append(board[i] + " ");
                     
                 }
                 
                 $("#word").append("<br />");
                 $("#word").append("<button type='button' onClick = 'showHint()' >Hint!</button>");
                //  $("#word").append("<span class = 'hint'>Hint: " + selectedHint + "</span>");
                 
                //  document.getElementById("word").appendChild(hintButton);
             }
             
             function showHint() {
                 alert(selectedHint);
                 remainingGuesses--;
                 updateMan();
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
                    updateMan();
                } 
                
                if(remainingGuesses <= 0) {
                    endGame(false);
                }
            }
            
            function updateWord(positions, letter) {
                for (var pos of positions) {
                    board[pos] = letter;
                }
                
                updateBoard();
            }
            
            function endGame(win) {
                $("#letters").hide();
                
                if(win) {
                    $("#won").show();
                } else {
                    $("#lost").show();
                }
            }
            
            function updateMan() {
                $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
            }
            
            function disableButton(btn) {
                btn.prop("disabled", true);
                btn.attr("class", "btn btn-danger");
            }
            
            function enableButton(btn) {
                btn.prop("disabled", false);
                btn.attr("class", "btn btn-success");
            }
            
            $(".replayBtn").on("click", function() {
                location.reload();
            })