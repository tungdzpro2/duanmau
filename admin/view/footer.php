    
    </section>
    <!-- footer -->

    <script>

        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement;
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });

    </script>

    <script src="js/hdtablee.js"></script>
    <script src="js/tk.js"></script>
    <script src="js/evtdom.js"></script>
    <script src="js/fetch.js"></script>
    
</body>

</html>