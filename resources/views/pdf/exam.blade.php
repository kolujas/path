<style>
    *{
        font-family: sans-serif;
    }

    header{
        background-image: linear-gradient(45deg, rgba(0, 145, 183, 0.9), rgba(1, 73, 105, 0.9));
        display: flex;
        justify-content: center;
        align-items: center;
    }

    header .logo{
        background: url("{{ asset('img/recursos/logo_white.png') }}") no-repeat center center;
        background-size: contain;
        width: 100%;
        height: 4.6rem;
        object-fit: contain;
    }

    h1{
        color: blue;
        border: 1px solid red;
    }

    @page {
        header: page-header;
        footer: page-footer;
    }
</style>

<htmlpageheader name="page-header">
    <header>
        <div class="logo"></div>
    </header>
</htmlpageheader>

<h1>PEPE</h1>

<htmlpagefooter name="page-footer">
	Your Footer Content
</htmlpagefooter>