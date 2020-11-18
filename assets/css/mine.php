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
    text-decoration: none;
    text-align: center;
    font-weight: 500;
    border: 2px solid black;
    width: 150px;
    height: 40px;
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

  .container-fluid-blue .row .col-md-4 h1 {
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
    margin-top: 100px;
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

  .profile-image-circle {
    width: 20rem;
    border-radius: 50%;

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

  /* read more, read less */
  .substr {
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    height: 30px;
  }

  .description {
    width: 400px;
    padding: 3px;
    margin-top: 30px;
    margin-bottom: 0;
  }


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

  /* Footer Start */

  .site-footer {
    background-color: rgba(127, 187, 202, 0.43);
    padding: 45px 0 20px;
    font-size: 15px;
    line-height: 24px;
    color: #737373;
  }

  .site-footer hr {
    border-top-color: #bbb;
    opacity: 0.5
  }

  .site-footer hr.small {
    margin: 20px 0
  }

  .site-footer h6 {
    color: black;
    font-size: 16px;
    text-transform: uppercase;
    margin-top: 5px;
    letter-spacing: 2px
  }

  .site-footer a {
    color: #737373;
  }

  .site-footer a:hover {
    color: #3366cc;
    text-decoration: none;
  }

  .footer-links {
    padding-left: 0;
    list-style: none
  }

  .footer-links li {
    display: block
  }

  .footer-links a {
    color: #737373
  }

  .footer-links a:active,
  .footer-links a:focus,
  .footer-links a:hover {
    color: #3366cc;
    text-decoration: none;
  }

  .footer-links.inline li {
    display: inline-block
  }

  .site-footer .social-icons {
    text-align: right
  }

  .site-footer .social-icons a {
    width: 40px;
    height: 40px;
    line-height: 40px;
    margin-left: 6px;
    margin-right: 0;
    border-radius: 100%;
    background-color: #33353d
  }

  .copyright-text {
    margin: 0
  }

  @media (max-width:991px) {
    .site-footer [class^=col-] {
      margin-bottom: 30px
    }
  }

  @media (max-width:767px) {
    .site-footer {
      padding-bottom: 0
    }

    .site-footer .copyright-text,
    .site-footer .social-icons {
      text-align: center
    }
  }

  .social-icons {
    padding-left: 0;
    margin-bottom: 0;
    list-style: none
  }

  .social-icons li {
    display: inline-block;
    margin-bottom: 4px
  }

  .social-icons li.title {
    margin-right: 15px;
    text-transform: uppercase;
    color: #96a2b2;
    font-weight: 700;
    font-size: 13px
  }

  .social-icons a {
    background-color: #eceeef;
    color: #818a91;
    font-size: 16px;
    display: inline-block;
    line-height: 44px;
    width: 44px;
    height: 44px;
    text-align: center;
    margin-right: 8px;
    border-radius: 100%;
    -webkit-transition: all .2s linear;
    -o-transition: all .2s linear;
    transition: all .2s linear
  }

  .social-icons a:active,
  .social-icons a:focus,
  .social-icons a:hover {
    color: #fff;
    background-color: #29aafe
  }

  .social-icons.size-sm a {
    line-height: 34px;
    height: 34px;
    width: 34px;
    font-size: 14px
  }

  .social-icons a.facebook:hover {
    background-color: #3b5998
  }

  .social-icons a.twitter:hover {
    background-color: #00aced
  }

  .social-icons a.linkedin:hover {
    background-color: #007bb6
  }

  .social-icons a.dribbble:hover {
    background-color: #ea4c89
  }

  @media (max-width:767px) {
    .social-icons li.title {
      display: block;
      margin-right: 0;
      font-weight: 600
    }
  }

  /* footer end */
</style>