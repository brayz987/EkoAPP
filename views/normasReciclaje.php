<?php

session_start();
$_SESSION['view'] = "Normas de Reciclaje";


if (!isset($_SESSION["user"])) {
    header("location: /ekoapp/");
    exit();
}
include '../template/header.php';
?>


<div class="container pt-7 col-sm-6">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pretium fusce id velit ut. Cras fermentum odio eu feugiat. Eu mi bibendum neque egestas congue quisque egestas. Eu volutpat odio facilisis mauris sit amet. Sagittis vitae et leo duis ut diam. Neque ornare aenean euismod elementum nisi quis eleifend. Vel quam elementum pulvinar etiam non quam lacus suspendisse. Et molestie ac feugiat sed lectus vestibulum mattis ullamcorper velit. Rhoncus est pellentesque elit ullamcorper dignissim. Integer vitae justo eget magna fermentum iaculis eu. Enim ut tellus elementum sagittis vitae. Ut tortor pretium viverra suspendisse potenti. Cras sed felis eget velit aliquet sagittis id. Sit amet nulla facilisi morbi tempus iaculis urna. Metus dictum at tempor commodo ullamcorper a lacus vestibulum. Velit euismod in pellentesque massa placerat duis. Ornare arcu dui vivamus arcu felis bibendum ut.</p>
                <p class="card-text">Massa sapien faucibus et molestie. Lectus urna duis convallis convallis tellus id interdum velit. Nulla porttitor massa id neque aliquam vestibulum. Non diam phasellus vestibulum lorem sed. Dictum varius duis at consectetur lorem donec massa. Nunc mattis enim ut tellus elementum sagittis. Varius sit amet mattis vulputate enim nulla aliquet porttitor lacus. Auctor eu augue ut lectus arcu bibendum at varius. Diam phasellus vestibulum lorem sed risus. Mauris in aliquam sem fringilla.</p>
                <p class="card-text">Sociis natoque penatibus et magnis. Sit amet consectetur adipiscing elit ut aliquam purus sit amet. Sit amet volutpat consequat mauris nunc. Eu consequat ac felis donec et odio. Turpis massa tincidunt dui ut. Nunc mattis enim ut tellus elementum. At tellus at urna condimentum mattis. Sit amet nisl suscipit adipiscing bibendum est ultricies integer quis. Duis at consectetur lorem donec massa. Amet mauris commodo quis imperdiet massa tincidunt nunc pulvinar sapien. Quam pellentesque nec nam aliquam sem et tortor consequat id. Ultrices neque ornare aenean euismod elementum nisi. A lacus vestibulum sed arcu non odio. Cras tincidunt lobortis feugiat vivamus. Sit amet purus gravida quis blandit turpis cursus. Egestas sed tempus urna et pharetra pharetra massa massa ultricies.</p>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footerOrange.php' ?>