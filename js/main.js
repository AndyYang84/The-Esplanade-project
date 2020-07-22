//Reuseable
function openSideMenu() {
    document.getElementById('side-menu').style.width = '180px';
    document.getElementById('main').style.marginLeft = '180px';
}

function CloseSideMenu() {
    document.getElementById('side-menu').style.width = '0px';
    document.getElementById('main').style.marginLeft = '0px';
}



$(function() {
    $(document).on('mouseenter', '#dropbtn', function() {
        $('.dropdown-content').css('display', 'block');
    });
    $(document).on('mouseleave', '#dropbtn', function() {
        $('.dropdown-content').css('display', 'none');
    })

    $(document).on('mouseover', '.dropdown-content', function() {
        $('.dropdown-content').css('display', 'block');
    });
    $(document).on('mouseleave', '.dropdown-content', function() {
        $('.dropdown-content').css('display', 'none');
    });




    //side-nav
    $(document).on('mouseover', '#dropbtn-side', function() {
        $('#dropdown-content-side').css('display', 'block');
    });
    $(document).on('mouseleave', '#dropdown-content-side', function() {
        $('#dropdown-content-side').css('display', 'none');
    });

});



//Clear Modal if mouse click on an empty place 
function clearModal(e) {
    if (e.target == modal) {
        modal.style.display = 'none';
    }
}

function closeModal() {
    modal.style.display = 'none';
}

//Event Listener
choices.forEach(ch => ch.addEventListener('click', play));
window.addEventListener('click', clearModal);
window.addEventListener('touchstart', clearModal);