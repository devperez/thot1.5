function toggleBlock() {
    let books = document.getElementById("books_block");
    let profile = document.getElementById("profile_block");
    let add = document.getElementById("add_books");
    let genres = document.getElementById('genres_block');
    let authors = document.getElementById('authors_block');
    let recent = document.getElementById('recent_block');
    let lending = document.getElementById('lending_block');
    
        books.style.display = "none"
        profile.style.display ="block"
        add.style.display = "none"
        genres.style.display ="none"
        authors.style.display ="none"
        recent.style.display ="none"
        lending.style.display ="none"
    
    }

    function addBook() {
        let books = document.getElementById("books_block");
        let add = document.getElementById("add_books");
        let profile = document.getElementById("profile_block");
        let genres = document.getElementById('genres_block');
        let authors = document.getElementById('authors_block');
        let recent = document.getElementById('recent_block');
        let lending = document.getElementById('lending_block');
        
            books.style.display = "none"
            add.style.display ="block"
            profile.style.display ="none"
            genres.style.display ="none"
            authors.style.display ="none"
            recent.style.display ="none"
            lending.style.display ="none"
        
        }

        function showAllBooks() {
            let books = document.getElementById("books_block");
            let add = document.getElementById("add_books");
            let profile = document.getElementById("profile_block");
            let genres = document.getElementById('genres_block');
            let authors = document.getElementById('authors_block');
            let recent = document.getElementById('recent_block');
            let lending = document.getElementById('lending_block');
            
                books.style.display = "block"
                add.style.display ="none"
                profile.style.display ="none"
                genres.style.display ="none"
                authors.style.display ="none"
                recent.style.display ="none"
                lending.style.display ="none"
            
            }
            function showGenres() {
                let books = document.getElementById("books_block");
                let add = document.getElementById("add_books");
                let profile = document.getElementById("profile_block");
                let genres = document.getElementById('genres_block');
                let authors = document.getElementById('authors_block');
                let recent = document.getElementById('recent_block');

                
                    books.style.display = "none"
                    add.style.display ="none"
                    profile.style.display ="none"
                    genres.style.display ="block"
                    authors.style.display ="none"
                    recent.style.display ="none"
                    lending.style.display ="none"
                
                }
                function showAuthors() {
                    let books = document.getElementById("books_block");
                    let add = document.getElementById("add_books");
                    let profile = document.getElementById("profile_block");
                    let genres = document.getElementById('genres_block');
                    let authors = document.getElementById('authors_block');
                    let recent = document.getElementById('recent_block');
                    let lending = document.getElementById('lending_block');
    
                    
                        books.style.display = "none"
                        add.style.display ="none"
                        profile.style.display ="none"
                        genres.style.display ="none"
                        authors.style.display ="block"
                        recent.style.display ="none"
                        lending.style.display ="none"
                    
                    }

                    function showRecent() {
                        let books = document.getElementById("books_block");
                        let add = document.getElementById("add_books");
                        let profile = document.getElementById("profile_block");
                        let genres = document.getElementById('genres_block');
                        let authors = document.getElementById('authors_block');
                        let recent = document.getElementById('recent_block');
                        let lending = document.getElementById('lending_block');
        
                        
                            books.style.display = "none"
                            add.style.display ="none"
                            profile.style.display ="none"
                            genres.style.display ="none"
                            authors.style.display ="none"
                            recent.style.display ="block"
                            lending.style.display ="none"
                        
                        }
                        function showLending() {
                            let books = document.getElementById("books_block");
                            let add = document.getElementById("add_books");
                            let profile = document.getElementById("profile_block");
                            let genres = document.getElementById('genres_block');
                            let authors = document.getElementById('authors_block');
                            let recent = document.getElementById('recent_block');
                            let lending = document.getElementById('lending_block');
            
                            
                                books.style.display = "none"
                                add.style.display ="none"
                                profile.style.display ="none"
                                genres.style.display ="none"
                                authors.style.display ="none"
                                recent.style.display ="none"
                                lending.style.display ="block"
                            
                            }