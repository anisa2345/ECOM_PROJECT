<?php
include("header.php");
include("session.php");
?>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      .obody {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        .oh1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        .op {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      .oi {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card1 {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    .obutton{
        background: #dc3545de;
        color: #fff;
        font-size: 17px;
        width: 100%;
        padding: 10px;
        border-radius: 30px;
        border: 0;
        outline: 0;
        margin-top: 50px;
        box-shadow: 0 10px 10px rgba(85,63,240,0.25);
        cursor: pointer;
        }
    </style>
    <body class="obody">
      <div class="card1">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark oi">✓</i>
      </div>
        <h1 class="oh1">Success</h1> 
        <p class="op">Your order is confirmed<br/> </p>
        <button type="button" class="obutton"><a style="color:white" href="myOrders.php">My Orders</a></button>
      </div>
    </body>
</html>