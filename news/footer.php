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

@media screen and (max-width: 640px) {
    #footer {
        flex-direction: column;
    }


    #footer .footer__logo {
        width: 100%;
    }
}
</style>
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