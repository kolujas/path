<section id="candidates" class="tab-content closed">
    <main class="row relative">
        <header class="content-header col-12 mx-md-4 mx-lg-0">
            <h2 class="text-uppercase text-left mt-4 mb-3 px-2 px-md-0">Candidates</h2>
            <div class="pointer-events mx-0 mb-3 px-2 px-md-0 d-flex align-items-center">
                <p class="filter-title mb-0 mr-3">Order by:</p>
                <button type="button" class="filter-button btn btn-two mr-3">Date</button>
                <button type="button" class="filter-button btn btn-two">Name [A-Z]</button>
            </div>
            <div class="pointer-events mb-4 px-2 px-md-0">
                <div class="search-bar">
                    <label for="search" class="label-search m-0 px-3"><i class="icon-search fas fa-search"></i></label>
                    <input id="search" data-name="candidates-search" class="filter filter-search input-search" placeholder="Type to search..." type="search">
                </div>
            </div>
        </header>
        <section class="table col-lg-6 mx-2 mx-md-4 mx-lg-0 mb-4 pr-lg-0">
            <table class="table"></table>
            <div class="filter-pagination"></div>
        </section>
        
        @component('components.modal.details')
        @endcomponent
    </main>
</section>
