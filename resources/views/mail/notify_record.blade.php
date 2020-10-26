@extends('layouts.mail')

@section('title')
    There are Records to evaluate
@endsection

@section('css')
    <style>
        table {
            max-width: 600px;
            padding: 10px;
            margin:0 auto;
            border-collapse: collapse;
        }

        td {
            background-color: #ecf0f1;
        }

        td > div {
            color: #34495e; 
            margin: 4% 10% 2%; 
            text-align: justify;
            font-family: sans-serif;
        }

        h2 {
            text-align: center; 
            color: #0F1626;
            margin: 20px 0;
        }

        td > div p:first-of-type {
            margin: 2px;
            padding-top: 2rem;
            text-align: center;
            font-family: sans-serif;
            font-size: 17px;
            min-height: 70px;
            background-color: #f8f8f8;
            padding: 1rem 1rem;
            margin-bottom: 2.5rem;
        }

        td > div p:last-of-type {
            color: #ffffff;
            font-size: 1.1rem;
            text-align:center;
            margin:30px 0 0;
            padding: 1rem;
            background-color: #0F1626;
            font-family: sans-serif;
        }

        td > div p:last-child a {
            color: #ffffff;
        }

        td > div div {
            width: 100%;
            text-align: center;
        }

        td > div div a {
            font-family: sans-serif;
            text-decoration:none;
            border-radius:5px;
            padding:11px 23px;
            color:white;
            background-color: #0F1626;
        }
    </style>
@endsection

@section('body')
    <table>
        <tr>
            <td>
                <div>
                    <h2>Hi!</h2>
                    <p>The records from the past week was deleted, remember, there are records to evaluate before <b>Monday 00:00</b></p>
                    <div>
                        <a target="_blank" href="http://atom8.cc/panel/records">Go to panel/records</a>
                    </div>
                    <p>© All rights reserved. | Developed by <a target="_black" href="https://www.plannet.cc/">plannet.cc</a></p>
                </div>
            </td>
        </tr>
    </table>
@endsection