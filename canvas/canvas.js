
    function creatCanvas(nbBranch){
        var c = document.getElementById("myCanvas");
            var ctx = c.getContext("2d");
            var img0 = document.getElementById("img0");
            var img1 = document.getElementById("img1");
            var img2 = document.getElementById("img2");
            var img3 = document.getElementById("img3");
            var img4 = document.getElementById("img4");
            var img5 = document.getElementById("img5");
            if (nbBranch >= 0) {
                if (nbBranch<=5) {
                    if (nbBranch >= 0) {
                        c.width  = innerWidth; //changer taille
                        c.height = innerHeight; //changer Taille
                        ctx.fillStyle = '#289447';
                        ctx.strokeStyle = '#289447';
                        ctx.lineWidth=30;
                        ctx.beginPath();
                        ctx.arc(450,450,100,0,2*Math.PI);
                        ctx.fill();
                        img0.style.visibility="visible";
                        img1.style.visibility="hidden";
                        img2.style.visibility="hidden";
                        img3.style.visibility="hidden";
                        img4.style.visibility="hidden";
                        img5.style.visibility="hidden";
                    }
                    if (nbBranch >= 1) {
                        ctx.beginPath()
                        ctx.moveTo(645,505);;
                        ctx.lineTo(450,505);
                        ctx.stroke();
                        ctx.beginPath()
                        ctx.moveTo(630,505);;
                        ctx.lineTo(630,630);
                        ctx.stroke();
                        ctx.beginPath();
                        ctx.arc(630,660,70,0,2*Math.PI);
                        ctx.fill();
                        img0.style.visibility="visible";
                        img1.style.visibility="visible";
                        img2.style.visibility="hidden";
                        img3.style.visibility="hidden";
                        img4.style.visibility="hidden";
                        img5.style.visibility="hidden";
                    }
                    if (nbBranch >= 2) {
                        ctx.beginPath()
                        ctx.moveTo(450,450);;
                        ctx.lineTo(450,180);
                        ctx.stroke();
                        ctx.beginPath();
                        ctx.arc(450,180,70,0,2*Math.PI);
                        ctx.fill();
                        img0.style.visibility="visible";
                        img1.style.visibility="visible";
                        img2.style.visibility="visible";
                        img3.style.visibility="hidden";
                        img4.style.visibility="hidden";
                        img5.style.visibility="hidden";
                    }
                    if (nbBranch >= 3) {
                        ctx.beginPath()
                        ctx.moveTo(285,505);;
                        ctx.lineTo(450,505);
                        ctx.stroke();
                        ctx.beginPath()
                        ctx.moveTo(300,505);;
                        ctx.lineTo(300,700);
                        ctx.stroke();
                        ctx.beginPath();
                        ctx.arc(300,710,70,0,2*Math.PI);
                        ctx.fill();
    
                        img0.style.visibility="visible";
                        img1.style.visibility="visible";
                        img2.style.visibility="visible";
                        img3.style.visibility="visible";
                        img4.style.visibility="hidden";
                        img5.style.visibility="hidden";
                    }
                    if (nbBranch >= 4) {
                        ctx.beginPath()
                        ctx.moveTo(520,450);;
                        ctx.lineTo(520,330);
                        ctx.stroke();
                        ctx.beginPath()
                        ctx.moveTo(505,320);;
                        ctx.lineTo(650,320);
                        ctx.stroke();
                        ctx.beginPath();
                        ctx.arc(680,320,70,0,2*Math.PI);
                        ctx.fill();
                        img0.style.visibility="visible";
                        img1.style.visibility="visible";
                        img2.style.visibility="visible";
                        img3.style.visibility="visible";
                        img4.style.visibility="visible";
                        img5.style.visibility="hidden";
                    }
                    if (nbBranch >= 5) {
                        ctx.beginPath()
                        ctx.moveTo(450,410);;
                        ctx.lineTo(190,410);
                        ctx.stroke();
                        ctx.beginPath();
                        ctx.arc(190,410,70,0,2*Math.PI);
                        ctx.fill();
                        img0.style.visibility="visible";
                        img1.style.visibility="visible";
                        img2.style.visibility="visible";
                        img3.style.visibility="visible";
                        img4.style.visibility="visible";
                        img5.style.visibility="visible";
                    
                    
                    }
                }
            }
    
        }
    creatCanvas(5);
    
    function mouseOver1(){
        document.getElementById("comp1").style.opacity = 1;
        document.getElementById("comp1").style.transform = "translateY(0px)";
    }
    
    function mouseOut1() {
        document.getElementById("comp1").style.opacity = 0;
        document.getElementById("comp1").style.transform = "translateY(-50px)";
    }


    
    function mouseOver2(){
        document.getElementById("comp2").style.opacity = 1;
        document.getElementById("comp2").style.transform = "translateY(0px)";
    }
    
    function mouseOut2() {
        document.getElementById("comp2").style.opacity = 0;
        document.getElementById("comp2").style.transform = "translateY(50px)";
    }

    
    
    function mouseOver3(){
        document.getElementById("comp3").style.opacity = 1;
        document.getElementById("comp3").style.transform = "translateY(0px)";
    }
    
    function mouseOut3() {
        document.getElementById("comp3").style.opacity = 0;
        document.getElementById("comp3").style.transform = "translateY(-50px)";
    }

    
    
    function mouseOver4(){
        document.getElementById("comp4").style.opacity = 1;
        document.getElementById("comp4").style.transform = "translateX(0px)";
    }
    
    function mouseOut4() {
        document.getElementById("comp4").style.opacity = 0;
        document.getElementById("comp4").style.transform = "translateX(-50px)";
    }

    
    
    function mouseOver5(){
        document.getElementById("comp5").style.opacity = 1;
        document.getElementById("comp5").style.transform = "translateX(0px)";
    }
    
    function mouseOut5() {
        document.getElementById("comp5").style.opacity = 0;
        document.getElementById("comp5").style.transform = "translateX(50px)";
    }
    