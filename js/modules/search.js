import $ from 'jquery';

class Search {
    //describe object
    constructor() {
        this.addSearchHtml();
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.searchField = $("#search-term");
        this.resultsDiv = $('#search-overlay_results');
        this.previousValue;
        this.events();
        this.isOverLayOpen = false;
        this.typingTimer;
        this.isSpinnerVisible = false;
    }

    // Events

    events() {
        this.openButton.on("click", this.openOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));
        $(document).on("keydown", this.keyPressDispatcher.bind(this));
        this.searchField.on("keyup", this.typingLogic.bind(this));
    }


    // methods
    typingLogic() {
        if (this.searchField.val() != this.previousValue && this.searchField.val()) {
            clearTimeout(this.typingTimer);
            if (this.searchField.val()) {
                if (!this.isSpinnerVisible) {
                    this.resultsDiv.html('<div class="spinner-loader"></div>');
                    this.isSpinnerVisible = true;
                }
                this.typingTimer = setTimeout(this.getResults.bind(this), 100);

            } else {
                this.resultsDiv.html('');
                this.isSpinnerVisible = false;
            }

            this.previousValue = this.searchField.val();

        } else if (!this.searchField.val()) {
            this.resultsDiv.html("");
        } else {
            this.resultsDiv.html("");
        }
    }
    getResults() {
        $.when(
            $.getJSON(siteSearch.root_url + '/wp-json/wp/v2/posts?search=' + this.searchField.val()),
            $.getJSON(siteSearch.root_url + '/wp-json/wp/v2/pages?search=' + this.searchField.val())
        ).then((posts, pages) => {
            let combinedResult = posts[0].concat(pages[0]);
            this.resultsDiv.html(
                `
                <h2 class="search-overlay__section-title"> General Information </h2>
                ${combinedResult.length ? '<ul class="link-list min-list">' : 'No Information matches your search'}
                    
                    ${combinedResult.map(element => `<li> <a href="${element.link}">${element.title.rendered}</a> </li>`).join("")
                }
                     
                ${combinedResult.length ? '</ul >' : ''} 
            `
            );
            this.isSpinnerVisible = false;
        }, () => {
            this.resultsDiv.html('<p>Unexpected Error; Please try again later.</p>')
        })


        //$.getJSON('http://localhost:3000/test/wp-json/wp/v2/posts?search=' + this.searchField.val(), function (posts) {
        //     this.resultsDiv.html(posts[0].title.rendered);
        // }.bind(this))
    }
    keyPressDispatcher(e) {

        if (e.keyCode == 83 && this.isOverLayOpen == false && !$("input, textarea").is(':focus')) {
            this.openOverlay();
        } else if (e.keyCode == 27 && this.isOverLayOpen == true) {
            this.closeOverlay();
        }
    }
    openOverlay() {
        this.typingLogic();
        this.searchOverlay.addClass("search-overlay--active");
        $("body").addClass("body-no-scroll");

        this.searchField.val('');

        setTimeout(() => {
            this.searchField.focus(); // This setTimeout is required to focus method to work, as the animation takes 300ms this needs to be done 
        }, 301);
        this.isOverLayOpen = true;
        // not working
    }

    closeOverlay() {
        this.searchOverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll");
        this.isOverLayOpen = false;

    }
    addSearchHtml() {
        $("body").append(`
                        <div class="search-overlay ">
                <div class="search-overlay-top">
                    <div class="container">
                        <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
                        <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term">
                        <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="container">
                    <div id="search-overlay_results">
                    </div>
                </div>
            </div>
        `)
    }
}

export default Search;

