<?php

// add the general head and body opening HTML tags including all common stylesheets
include_once 'components/head.php';

// here comes your PHP code generating the body content of your page

include_once 'components/navbar.php';
?>

<main class="green lighten-3">
    <section class="page-content">
        <h4>Add a new movie</h4>
        <div class="row">
            <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                <input id="last_name" type="text" class="validate">
                <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input disabled value="I am not editable" id="disabled" type="text" class="validate">
                <label for="disabled">Disabled</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="password" type="password" class="validate">
                <label for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="email" type="email" class="validate">
                <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                This is an inline input field:
                <div class="input-field inline">
                    <input id="email_inline" type="email" class="validate">
                    <label for="email_inline">Email</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                </div>
                </div>
            </div>
            </form>
        </div>        
    </section>
</main>

<?php 
include_once 'components/footer.php';

// add general jQuery and Materialize scrip files
include_once 'components/script.php';

// add below here your page specific script file if you need
// <script src="scripts/myscript.js"></script>

// including the general closing body HTML tags
include_once 'components/tail.php';
?>