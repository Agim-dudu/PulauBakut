<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slide Puzzle</title>
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/puzzle.css">
    <style>
        #startButton {
            margin-bottom: 10px;
        }
    </style>
    <script>
        var rows = 3;
        var columns = 3;

        var currTile;
        var otherTile; //blank tile

        var turns = 0;
        var seconds = 0;
        var timer;

        var imgOrder = ["4", "2", "8", "5", "1", "6", "7", "9", "3"];

        function startGame() {
            startTimer();

            for (let r = 0; r < rows; r++) {
                for (let c = 0; c < columns; c++) {
                    let tile = document.createElement("img");
                    tile.id = r.toString() + "-" + c.toString();
                    tile.src = "{{ asset('/') }}assets/img/puzzle/" + imgOrder.shift() + ".jpg"; // Ubah path gambar

                    // Tambahkan event listener drag pada gambar
                    tile.addEventListener("dragstart", dragStart);
                    tile.addEventListener("dragover", dragOver);
                    tile.addEventListener("dragenter", dragEnter);
                    tile.addEventListener("dragleave", dragLeave);
                    tile.addEventListener("drop", dragDrop);
                    tile.addEventListener("dragend", dragEnd);

                    document.getElementById("board").append(tile);
                }
            }

            document.getElementById("startButton").disabled = true;
        }

        function startTimer() {
            timer = setInterval(updateTimer, 1000);
        }

        function updateTimer() {
            seconds++;
            document.getElementById("timer").innerText = seconds;
        }

        function stopTimer() {
            clearInterval(timer);
        }

        function dragStart() {
            currTile = this;
        }

        function dragOver(e) {
            e.preventDefault();
        }

        function dragEnter(e) {
            e.preventDefault();
        }

        function dragLeave() {

        }

        function dragDrop() {
            otherTile = this;
        }

        function dragEnd() {
            if (!otherTile.src.includes("3.jpg")) {
                return;
            }

            let currCoords = currTile.id.split("-");
            let r = parseInt(currCoords[0]);
            let c = parseInt(currCoords[1]);

            let otherCoords = otherTile.id.split("-");
            let r2 = parseInt(otherCoords[0]);
            let c2 = parseInt(otherCoords[1]);

            let moveLeft = r === r2 && c2 === c - 1;
            let moveRight = r === r2 && c2 === c + 1;
            let moveUp = c === c2 && r2 === r - 1;
            let moveDown = c === c2 && r2 === r + 1;

            let isAdjacent = moveLeft || moveRight || moveUp || moveDown;

            if (isAdjacent) {
                let currImg = currTile.src;
                let otherImg = otherTile.src;

                currTile.src = otherImg;
                otherTile.src = currImg;

                turns += 1;
                document.getElementById("turns").innerText = turns;

                checkWin();
            }
        }

        function checkWin() {
            var images = document.querySelectorAll("#board img");
            var correctOrder = true;

            for (var i = 0; i < images.length; i++) {
                var expectedImg = "{{ asset('/') }}assets/img/puzzle/" + (i + 1) + ".jpg";
                if (images[i].src !== expectedImg) {
                    correctOrder = false;
                    break;
                }
            }

            if (correctOrder) {
                stopTimer();
                alert("Selamat! Anda Menyelesaikan Game Dengan Waktu : " + seconds + " seconds.");
            }
        }
    </script>
</head>

<body>
    <h1 style="font-size: 50px">Nasalis larvatus</h1>
    <div id="board"></div>
    <h2>Turns: <span id="turns">0</span></h2>
    <h2>Time: <span id="timer">0</span> seconds</h2>
    <button style="background-color:rgb(98, 202, 89); font-size:25px; border-radius:10px; color:white; width:100px;" id="startButton" onclick="startGame()">Mulai</button>
</body>
</html>
