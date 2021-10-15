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
        .empty {
            z-index: 4;
            position: absolute;
            top: 1;
            left: 1;
            width: 78px;
            height: 78px;
            border-radius: 50px;
        }
        .empty:hover {
            background-color: rgb(27, 27, 27); 
            opacity: 0.3;
        }
    </style>
@stop()

@section('navbar')
@section('content')
    <div class="board">
        <table class="interactive-board">
            <tr>
                <td><p class="black-piece"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
            </tr>
            <tr>
                <td><p class="white-piece"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
            </tr>
            <tr>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
            </tr>
            <tr>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
            </tr>
            <tr>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
            </tr>
            <tr>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
            </tr>
            <tr>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
            </tr>
            <tr>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
            </tr>
            <tr>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
                <td><p class="empty"></p></td>
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