<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hofris
 */

get_header(); ?>

        <article>
            <div class="container">
                <div class="row">
                    <!-- left side -->
                    <div class="col-md-8">
                        <?php include "slider.php"; ?>
                        <div class="home-boxes">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="boxes">
                                        <a href="article.php">
                                            <div class="graph">
                                                <img src="img/dummy.jpg" alt="" class="img-responsive">
                                            </div>
                                            <div class="details">
                                                <h3>profile</h3>
                                                <h2>judul artikel</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, consectetur adipisicing elit,</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="boxes">
                                        <a href="article.php">
                                            <div class="graph">
                                                <img src="img/dummy.jpg" alt="" class="img-responsive">
                                            </div>
                                            <div class="details">
                                                <h3>profile</h3>
                                                <h2>judul artikel</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, consectetur adipisicing elit,</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="boxes">
                                        <a href="article.php">
                                            <div class="graph">
                                                <img src="img/dummy.jpg" alt="" class="img-responsive">
                                            </div>
                                            <div class="details">
                                                <h3>profile</h3>
                                                <h2>judul artikel</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, consectetur adipisicing elit,</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="boxes">
                                        <a href="article.php">
                                            <div class="graph">
                                                <img src="img/dummy.jpg" alt="" class="img-responsive">
                                            </div>
                                            <div class="details">
                                                <h3>profile</h3>
                                                <h2>judul artikel</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, consectetur adipisicing elit,</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="boxes">
                                        <a href="article.php">
                                            <div class="graph">
                                                <img src="img/dummy.jpg" alt="" class="img-responsive">
                                            </div>
                                            <div class="details">
                                                <h3>profile</h3>
                                                <h2>judul artikel</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, consectetur adipisicing elit,</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="boxes">
                                        <a href="article.php">
                                            <div class="graph">
                                                <img src="img/dummy.jpg" alt="" class="img-responsive">
                                            </div>
                                            <div class="details">
                                                <h3>profile</h3>
                                                <h2>judul artikel</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, consectetur adipisicing elit,</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right side -->
                    <div class="col-md-4">
                        <div class="box-sidebar">
                            <div class="boxes">
                                <a href="article.php">
                                    <div class="graph">
                                        <img src="img/dummy.jpg" alt="" class="img-responsive">
                                    </div>
                                    <div class="details">
                                        <h3>profile</h3>
                                        <h2>judul artikel</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, consectetur adipisicing elit,</p>
                                    </div>
                                </a>
                            </div>
                            <div class="boxes">
                                <a href="article.php">
                                    <div class="graph">
                                        <img src="img/dummy.jpg" alt="" class="img-responsive">
                                    </div>
                                    <div class="details">
                                        <h3>profile</h3>
                                        <h2>judul artikel</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, consectetur adipisicing elit,</p>
                                    </div>
                                </a>
                            </div>
                            <div class="boxes">
                                <a href="article.php">
                                    <div class="graph">
                                        <img src="img/dummy.jpg" alt="" class="img-responsive">
                                    </div>
                                    <div class="details">
                                        <h3>profile</h3>
                                        <h2>judul artikel</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, consectetur adipisicing elit,</p>
                                    </div>
                                </a>
                            </div>
                            <div class="boxes">
                                <img src="img/img-sosmed.jpg" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
