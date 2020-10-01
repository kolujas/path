<style>
    * {
        font-family: sans-serif;
    }

    header {
        background-color: #014969;
        text-align: center;
        width: 100%;
    }

    main {
        border: 1rem;
    }

    h3{
        text-align: left;
        margin: 2rem 0;
        padding: 0 2rem;
    }

    mark{
        background: none;
        color: #0091B7;
    }

    table{
        margin: auto;
        border: 1px solid #ccc;
        padding: 0;
    }

    /* table th, table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6; */

    tr, th{
        padding: 2rem;
    }


    footer {
        text-align: right;
        color: rgba(1, 73, 105, 0.9);
        border: 1rem;
    }

    @page {
        header: page-header;
        footer: page-footer;
    }
</style>

<body>
    <htmlpageheader name="page-header">
        <header>
            <img width="4.6rem" height="4.6rem" src="
            data:image/png;base64,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" alt="">
        </header>
    </htmlpageheader>

    <main>
        <h2 style="text-align: center;">Example Exam</h2>
        <h3>1. Look at the table below. Listen to Susana talking about her family, and complete the spaces in the table. You can listen twice.<mark> One is done for you.</mark></h3>
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

        <h3>2. You will hear Susana talking about happy days and sad days. Which are happy, and which are sad? <mark>One is done for you.</mark></h3>

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
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h3>3. Where Jack lives there are ten houses. Listening to him tell you about each house, then complete the table with the numbers <mark>Two are done for you.</mark></h3>

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
    </main>

    <htmlpagefooter name="page-footer">
        <footer>
            {PAGENO}
        </footer>
    </htmlpagefooter>
</body>