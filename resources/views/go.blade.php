@extends('layouts._layout')

@section('title',  'Go')
@section('head')
    <style>
        .board {
            position: relative;
            background-color: tan;
            width: 720px;
            height: 720px;
            outline: 2px solid black;
            padding: 40px;
        }
        .visual-board td {
            background-color: tan;
            width: 80px;
            height: 80px;
            border: 2px solid black;
            text-align: center;
        }
        .interactive-board {
            position: absolute;
            /* opacity: 0.3; */
            z-index: 2;
            left: 0px;
            top: 0px;
        }
        .interactive-board td {
            position: relative;
            /* background-color: skyblue; 
            outline: 1px solid black;  */
            width: 80px;
            height: 80px;
            text-align: center; 
        }
        .black-piece {
            z-index: 4;
            position: absolute;
            top: 1;
            left: 1;
            width: 78px;
            height: 78px;
            border-radius: 50px;
            background-color: rgb(27, 27, 27); 
        }
        .white-piece {
            z-index: 4;
            position: absolute;
            top: 1;
            left: 1;
            width: 78px;
            height: 78px;
            opacity: 1;
            border-radius: 50px;
            background-color: rgb(245, 245, 245); 
        }
        .empty-white, .empty-black {
            z-index: 4;
            position: absolute;
            top: 1;
            left: 1;
            width: 78px;
            height: 78px;
            border-radius: 50px;
        }
        .empty-black:hover {
            background-color: rgb(27, 27, 27); 
            opacity: 0.3;
        }
        .empty-white:hover {
            background-color: rgb(245, 245, 245); 
            opacity: 0.3;
        }
    </style>
    <script>
        const stone = {
            none: 0,
            black: 1,
            white: 2
        };
        let blackTurn = true;
        let board = [
            [stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none],
            [stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none],
            [stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none],
            [stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none],
            [stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none],
            [stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none],
            [stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none],
            [stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none],
            [stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none, stone.none]
        ];

        function stoneClick(id) {
            const pointId = id.split(",");
            const point = {
                x: pointId[0],
                y: pointId[1]
            };

            if (board[point.x][point.y] == stone.none) {
                if (blackTurn) {
                    setBlackStone(id, point.x, point.y);
                } else {
                    setWhiteStone(id, point.x, point.y);
                }

                switchTurns();
            }
        }

        function setBlackStone(id, x, y) {
            board[x][y] = stone.black;
            document.getElementById(id).className = "black-piece";
        }

        function setWhiteStone(id, x, y) {
            board[x][y] = stone.white;
            document.getElementById(id).className = "white-piece";
        }
        function switchTurns() {
            if (blackTurn) {
                let elements = document.querySelectorAll('p.empty-black');
                for (let e of elements) {
                    e.className = 'empty-white';
                }
            } else {
                let elements = document.querySelectorAll('p.empty-white');
                for (let e of elements) {
                    e.className = 'empty-black';
                }
            }
            blackTurn = !blackTurn;
        }
    </script>
@stop()

@section('navbar')
@section('content')
    <div class="board">
        <table id="interactive-board" class="interactive-board">
            <tr>
                <td><p id="0,0" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="1,0" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="2,0" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="3,0" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="4,0" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="5,0" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="6,0" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="7,0" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="8,0" class="empty-black" onclick="stoneClick(this.id)"></p></td>
            </tr>
            <tr>
                <td><p id="0,1" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="1,1" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="2,1" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="3,1" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="4,1" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="5,1" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="6,1" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="7,1" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="8,1" class="empty-black" onclick="stoneClick(this.id)"></p></td>
            </tr>
            <tr>
                <td><p id="0,2" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="1,2" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="2,2" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="3,2" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="4,2" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="5,2" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="6,2" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="7,2" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="8,2" class="empty-black" onclick="stoneClick(this.id)"></p></td>
            </tr>
            <tr>
                <td><p id="0,3" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="1,3" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="2,3" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="3,3" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="4,3" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="5,3" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="6,3" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="7,3" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="8,3" class="empty-black" onclick="stoneClick(this.id)"></p></td>
            </tr>
            <tr>
                <td><p id="0,4" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="1,4" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="2,4" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="3,4" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="4,4" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="5,4" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="6,4" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="7,4" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="8,4" class="empty-black" onclick="stoneClick(this.id)"></p></td>
            </tr>
            <tr>
                <td><p id="0,5" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="1,5" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="2,5" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="3,5" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="4,5" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="5,5" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="6,5" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="7,5" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="8,5" class="empty-black" onclick="stoneClick(this.id)"></p></td>
            </tr>
            <tr>
                <td><p id="0,6" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="1,6" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="2,6" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="3,6" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="4,6" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="5,6" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="6,6" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="7,6" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="8,6" class="empty-black" onclick="stoneClick(this.id)"></p></td>
            </tr>
            <tr>
                <td><p id="0,7" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="1,7" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="2,7" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="3,7" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="4,7" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="5,7" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="6,7" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="7,7" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="8,7" class="empty-black" onclick="stoneClick(this.id)"></p></td>
            </tr>
            <tr>
                <td><p id="0,8" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="1,8" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="2,8" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="3,8" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="4,8" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="5,8" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="6,8" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="7,8" class="empty-black" onclick="stoneClick(this.id)"></p></td>
                <td><p id="8,8" class="empty-black" onclick="stoneClick(this.id)"></p></td>
            </tr>
        </table>
        <table class="visual-board">
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
        </table>
        
    </div>
@stop()