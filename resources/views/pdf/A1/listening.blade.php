@extends('pdf.exam')

@section('css')
    
@endsection

@section('title')
    Example exam 1
@endsection

@section('main')
    <header>
        <h2 style="text-align: center;">Listening</h2>
    </header>

    <section>
        <header>
            <h3>1. Look at the table below. Listen to Susana talking about her family, and complete the spaces in the table. You can listen twice.<mark> One is done for you.</mark></h3>
        </header>
        <table style="margin: auto; border: 1px solid #ccc;">
            <thead>
                <tr style="background-color: #fff;">
                    <th style="padding: 1rem 2rem;" scope="col"></th>
                    <th style="padding: 1rem 2rem;" scope="col">Me</th>
                    <th style="padding: 1rem 2rem;" scope="col">ther</th>
                    <th style="padding: 1rem 2rem;" scope="col">ther</th>
                    <th style="padding: 1rem 2rem;" scope="col">sister</th>
                    <th style="padding: 1rem 2rem;" scope="col">er</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" style="background-color: #ccc; padding: 1rem 2rem;">Name</th>
                    <td style="background-color: #ccc; border: 0; padding: 1rem 2rem;">Susana</td>
                    <td style="background-color: #ccc; border: 0; padding: 1rem 2rem;">Lee</td>
                    <td style="background-color: #ccc; border: 0; padding: 1rem 2rem;">Alex</td>
                    <td style="background-color: #ccc; border: 0; padding: 1rem 2rem;">Gemma</td>
                    <td style="background-color: #ccc; border: 0; padding: 1rem 2rem;">Phil</td>
                </tr>
                <tr>
                    <th style="padding: 1rem 2rem;" scope="row">Age</th>
                    <td></td>
                    <td style="text-align: center">40</td>
                    <td style="text-align: center">38</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th style="background-color: #ccc; border: 0; padding: 1rem 2rem;" scope="row">Job</th>
                    <td style="text-align: center; background-color: #ccc; border: 0; padding: 1rem 2rem;">-</td>
                    <td style="text-align: center; background-color: #ccc; border: 0; padding: 1rem 2rem;">teer</td>
                    <td style="text-align: center; background-color: #ccc; border: 0; padding: 1rem 2rem;">docor</td>
                    <td style="text-align: center; background-color: #ccc; border: 0; padding: 1rem 2rem;">-</td>
                    <td style="text-align: center; background-color: #ccc; border: 0; padding: 1rem 2rem;">-</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section>
        <header>
            <h3>2. You will hear Susana talking about happy days and sad days. Which are happy, and which are sad? <mark>One is done for you.</mark></h3>
        </header>
        <table class="table table-striped mb-4">
            <thead>
                <tr>
                    <th class="text-center" scope="col"><i class="face-icons far fa-smile "></i>OK</th>
                    <th scope="col"></span>day</th>
                    <th scope="col"></span>day</th>
                    <th scope="col"></span>day</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="text-center" scope="row"><i class="face-icons far fa-frown text-center"></i>BAD
                    </th>
                    <th style="background-color: #ccc; border-left: 1px solid #ccc;" scope="col"></span>day</th>
                    <th style="background-color: #ccc; border: 0;" scope="col"></span>day</th>
                    <th style="background-color: #ccc; border: 0;" scope="col"></span>day</th>
                </tr>
            </tbody>
        </table>
    </section>

    <pagebreak />
    
    <section>
        <header>
            <h3>3. Where Jack lives there are ten houses. Listening to him tell you about each house, then complete the table with the numbers <mark>Two are done for you.</mark></h3>
        </header>
        <table class="table table-striped mb-4 table-question-3">
            <thead>
                <tr>
                    <th style="border-bottom: 1px solid #ccc" scope="col">I live at..</th>
                    <th style="background-color: #ccc;" scope="col"></th>
                    <th style="border-bottom: 1px solid #ccc" scope="col">North street</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="border-bottom: 1px solid #ccc" scope="col">A teacher lives at number..</th>
                    <th style="background-color: #ccc;" scope="col">1</th>
                    <th style="border-bottom: 1px solid #ccc" scope="col"></th>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ccc" scope="col">A nurse lives at numbers..</th>
                    <th style="background-color: #ccc;" scope="col"></th>
                    <th style="border-bottom: 1px solid #ccc" scope="col"></th>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ccc" scope="col">My aunt Wendy lives at number..</th>
                    <th style="background-color: #ccc;" scope="col"></th>
                    <th style="border-bottom: 1px solid #ccc" scope="col"></th>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ccc" scope="col">I don't know who lives at number..</th>
                    <th style="background-color: #ccc;" scope="col"></th>
                    <th style="border-bottom: 1px solid #ccc" scope="col"></th>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ccc" scope="col">I don't know who lives at number..</th>
                    <th style="background-color: #ccc;" scope="col"></th>
                    <th style="border-bottom: 1px solid #ccc" scope="col"></th>

                </tr>
                <tr>
                    <th style="border-bottom: 1px solid #ccc" scope="col">Number..</th>
                    <th style="background-color: #ccc;" scope="col"></th>
                    <th style="border-bottom: 1px solid #ccc" scope="col">is a cafe</th>
                </tr>
            </tbody>
        </table>
    </section>
@endsection