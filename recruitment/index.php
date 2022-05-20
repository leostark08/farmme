<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recruitment.css">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    <title>Recruitment</title>
</head>

<body>
    <div class="hero">
        <div class="decor">
            <div class="decor__desc">
                <div class="title"></div>
                <img class="decor--left" src="images/text-deco.png" alt="">
                <img class="decor--center" src="images/text-deco-center.png" alt="">
                <p>Together, we build a better fantasy metaverse world!</p>
            </div>
            <img src="images/deco.png" alt="">
        </div>
        <a href="#positions">
            <span id="btn-scroll">Our Openings</span>
        </a>
    </div>


    <div class="filter-container" id="positions">
        <h2>Our Openings</h2>
        <div class="filters ft">
            <div class="ft__department">
                <div class="label"><label for="filter-department">Departments</label></div>
                <select name="filter-department" id="filter-department">
                    <option value="" value="0">Blockchain Developer</option>
                    <option value="" value="0">Blockchain Developer</option>
                    <option value="" value="0">Blockchain Developer</option>
                </select>
            </div>
            <div class="ft_location">
                <div class="label"><label for="filter-location">Locations</label></div>
                <select name="filter-location" id="filter-location">
                    <option value="" value="0"> Da nang</option>
                    <option value="" value="0"> Da nang</option>
                    <option value="" value="0"> Da nang</option>
                </select>
            </div>
        </div>
        <div class="positions">
            <div class="pst">
                <div class="pst__info">
                    <div class="title">Blockchain Developer</div>
                    <div class="short">
                        <div class="short__location">Da nang, VN</div>
                        <div class="short__department">Fulltime</div>
                    </div>
                </div>
                <a href="#">Apply</a>
            </div>
        </div>
    </div>

</body>
<script src="recruitment.js"></script>

</html>