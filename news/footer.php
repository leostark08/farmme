<style>
.footer__logo {
    display: grid;
    place-items: center;
    width: 30%;
}

.footer__logo img {
    width: 50%;
}

#footer {
    display: flex;
    width: 100%;
}

.links {
    flex: 1;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.links ul {
    list-style: none;
    flex-grow: 1;
}

.links li {
    padding: 5px 10px;
}

.links ul a {
    text-decoration: none;
    font-size: 18px;
    color: var(--brown);
    font-weight: bold;
    font-family: 'Arial';
}

.subscribe-container {
    margin-top: 200px;
    position: relative;
}

.subscribe-container .subscribe {
    position: relative;
    width: 50%;
    background-color: var(--brown);
    display: flex;
    margin: auto;
    padding: 2px;
    border-radius: 5px;
}

.subscribe-container .subscribe::before {
    position: absolute;
    right: 0;
    content: "";
    width: 200px;
    height: 100px;
    background: url("images/monster0.png") bottom center no-repeat;
    background-size: contain;
    bottom: 100%;
}

.subscribe input {
    flex: 1;
    padding: 10px;
    border: none;
    outline: none;
    background-color: var(--brown);
    color: #fff;
}

.subscribe input::placeholder {
    color: #f5dcc0;
}

.subscribe button {
    width: 200px;
    background-color: #f5dcc0;
    border: none;
    border-radius: 5px;
    color: var(--brown);
}

@media screen and (max-width: 1023px) {

    .subscribe-container .subscribe {
        width: 75%;
    }

    .footer__logo img {
        width: 75%;
    }
}

@media screen and (max-width: 767px) {
    .subscribe {
        flex-direction: column;
        width: 100% !important;
    }

    .subscribe button {
        padding: 10px;
        width: inherit;
    }

    #footer {
        flex-direction: column;
    }


    #footer .footer__logo {
        width: 100%;
    }
}
</style>
<div class="subscribe-container container">
    <div class="subscribe">
        <input type="text" placeholder="Type your email...">
        <button>Subscribe</button>
    </div>
</div>
<footer id="footer">
    <div class="footer__logo">
        <img src="images/footer-logo.png" alt="">
    </div>
    <div class="links">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Overview</a></li>
            <li><a href="#">Whitepaper</a></li>
            <li><a href="#">Pitch Deck</a></li>
        </ul>
        <ul>
            <li><a href="#">News</a></li>
            <li><a href="#">Ecosystem</a></li>
            <li><a href="#">Token Metrics</a></li>
            <li><a href="#">Marketplace</a></li>
        </ul>
        <ul>
            <li><a href="#">Term of Use</a></li>
            <li><a href="#">Privacy Policy</a></li>
        </ul>
    </div>
</footer>