<?php

    Class Movie {
        public $id;
        public $title;
        public $description;
        public $image;
        public $trailer;
        public $category;
        public $length;
        public $users_id;

        //Should have a class for this considering that it is being used more than 1 time.
        public function generateImageName() {
            return bin2hex(random_bytes(50)) . ".jpg";
        }
    }

    interface MovieDAOInterface {
        // build an movie object and create a movie in the DB ---
        public function buildMovie($data);
        public function create(Movie $movie);
        // Finders ----------------------------------------------
        public function findAll($id = (-1));
        public function findById($id);
        public function findByTitle($title);
        // Get an array of movies -------------------------------
        public function getLatestMovies();
        public function getMoviesByCategory();
        public function getMoviesByUserId();
        // Update and destroy movies ----------------------------
        public function update($id, $column, $value);
        public function updateAll(Movie $movie);
        public function destroy($id);
    }

?>