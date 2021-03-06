import React, { useState } from 'react';
import axios from "axios";
import Slider from "react-slick";
// import "slick-carousel/slick/slick.css";
// import "slick-carousel/slick/slick-theme.css";


const SlickImage: React.FC = () => {
    const settings = {
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1
    };
    return (
        <div>
            <h2> Single Item</h2>
            <Slider {...settings}>
                <div>
                    <h3>Test</h3>
                </div>
                <div>
                    <h3>2</h3>
                </div>
                <div>
                    <h3>3</h3>
                </div>
                <div>
                    <h3>4</h3>
                </div>
                <div>
                    <h3>5</h3>
                </div>
                <div>
                    <h3>6</h3>
                </div>
            </Slider>
        </div>
    );
}
export default SlickImage;