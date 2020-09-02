<?php
header("Content-type: text/css; charset: UTF-8");

$url = "http://localhost/bookStore";

?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Fira+Sans&family=Karla:ital@1&family=PT+Sans&family=Work+Sans&display=swap');

  .font {
    font-family: 'Fira Sans', sans-serif;
    font-family: 'Karla', sans-serif;
    font-family: 'PT Sans', sans-serif;
    font-family: 'Work Sans', sans-serif;
  }

  @font-face {
    font-family: Point;
    src: url("<?= $url; ?>/assets/fonts/p-sans.ttf");
  }

  /* Container 1 Start */
  .container-mine {
    width: 100%;
    display: flex;
    margin-bottom: 100px;
  }

  .container-mine img {
    margin-top: 70px;
  }

  .back-biru {
    width: 840px;
    height: 60px;
    margin-top: 100px;
    background-color: #7FBBCA;
  }

  .decor h1 {
    font-family: 'Fira Sans', sans-serif;
    font-weight: 500;
    text-align: center;
    color: white;
    margin: 0;
  }

  .decor .h1-black {
    color: black;
    margin-top: 5px;
    text-align: left;
    margin-left: 42px;
  }

  .decor h3 {
    font-family: 'Work Sans', sans-serif;
    font-weight: 100;
    margin-top: 5px;
    margin-left: 42px;
    color: #999;
  }

  .container-mine button {
    font-family: 'Fira Sans', sans-serif;
    font-weight: 500;
    margin-left: 42px;
    background: #7FBBCA;
    padding: 5px;
    width: 162px;
    border-radius: 20px;
    border: none;
    color: white;
    transition: all .2s ease-in-out;
  }

  .container-mine button:hover {
    transform: scale(1.1);
  }

  /* Container 1 end */

  /* Container 2 Start */

  .col-md-4 .mb-4 {
    margin-left: 20px;
  }

  .container-fluid .text-up h2 {
    font-family: 'Fira Sans', sans-serif;
    font-weight: 500;
  }

  .container-fluid .text-up button {
    background: none;
    font-family: 'Fira Sans', sans-serif;
    font-weight: 500;
    border: 2px solid black;
    width: 150px;
    height: 42px;
    transition: 0.5s;
  }

  .container-fluid .text-up button:hover {
    background: black;
    color: white;
  }

  .card-title {
    font-family: 'Fira Sans', sans-serif;
    font-weight: 500;
  }

  .writer-book {
    color: #999;
    font-family: 'Karla', sans-serif;
  }

  /* Container 2 End */

  /* container 3 start */

  .container-fluid-blue {
    background: rgba(127, 187, 202, 0.43);
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
  }

  .container-fluid-blue .row .col-md-3 {
    margin-top: 300px;
  }

  .container-fluid-blue .row .col-md-3 h1 {
    font-family: 'Fira Sans', sans-serif;
    font-weight: 500;
    font-size: 40px;
    margin: 0;
  }

  .font-weight-normal {
    font-family: 'Work Sans', sans-serif;
    font-size: 30px;
  }

  .container-fluid-blue .row .col-md-4 {
    margin-top: 200px;
    padding: 20px;
  }

  .container-fluid-blue .row .col-md-5 {
    margin-top: 150px;
    padding: 20px;
  }

  /* container 3 end */

  /* container 4 start */
  .container-fluid-blue-dark {
    background: #7FBBCA;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
  }

  /* container 4 end */

  /* contact start */
  .back-biru-contact {
    width: 300px;
    text-align: center;
    height: 55px;
    margin-top: 100px;
    background-color: #7FBBCA;
    font-family: 'Fira Sans', sans-serif;
    font-weight: 500;
    color: white;
  }

  .form input {
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: 1px solid #999;
    width: auto;
    padding: 5px;
    
    font-family: 'Karla', sans-serif;
  }

  /* contact end */


  /* Media */
  @media screen and (max-width: 1080px) {

    /* container 1  */
    .container-mine img {
      display: none;

    }

    .container-mine {
      width: auto;
      height: auto;
      margin: 0;
    }

    .back-biru {
      width: 800px;
      height: 100px;
      margin: 0;
      padding: 10px;
      background-color: #7FBBCA;
    }

    .decor .h1-black {
      color: black;
      margin-top: 30px;
      font-size: 25px;
    }

    .decor h3 {
      font-family: 'Work Sans', sans-serif;
      font-weight: 100;
      margin-top: 5px;
      color: #999;
      font-size: 18px;
    }

    .container-mine button {
      font-family: 'Fira Sans', sans-serif;
      font-weight: 500;
      background: #7FBBCA;
      padding: 5px;
      margin: 0;
      width: 100%;
      border-radius: 20px;
      border: none;
      color: white;
      transition: all .2s ease-in-out;
    }

    /* container 1 end */


    /* container 2 */
    .col-md-6 {
      margin-top: 100px;
    }

    .container-fluid .text-up h2 {
      font-family: 'Fira Sans', sans-serif;
      font-weight: 500;
      display: none;
    }

    .container-fluid .text-up button {
      background: none;
      font-family: 'Fira Sans', sans-serif;
      font-weight: 500;
      border: 2px solid black;
      width: 150px;
      height: 42px;
      transition: 0.5s;
      margin-bottom: 20px;
      margin-right: 20px;
    }

    /* container 2 end */

    /* container 3 */

    .container-fluid-blue .row .col-md-3 {
      margin: 20px;
    }

    .container-fluid-blue .row .col-md-4 {
      margin: 0;
      padding: 20px;
    }

    .container-fluid-blue .row .col-md-5 {
      margin: 0;
      padding: 20px;
    }
  }
</style>