<style>
.button-scroll a {
  display: block;
  font-size: 16px;
  width: 50px;
  height: 50px;
  line-height: 50px;
  -webkit-border-radius: 50px;
  text-align: center;
  border-radius: 50px;
  background: <?php echo get_option( 'scroll_button_color' ) ?>;
  color: #ffffff;
  -webkit-box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, 0.3);
  box-shadow: 1px 1px 4px 1px rgba(0, 0, 0, 0.3);
  z-index: 2147483647;
  text-decoration: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
}

.button-scroll a:visited {
  color: #ffffff;
}

.slider-color {
    -webkit-appearance: none;
    height: 15px;
    border-radius: 5px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: opacity .15s ease-in-out;
    transition: opacity .15s ease-in-out;
    direction:rtl;
}

</style>