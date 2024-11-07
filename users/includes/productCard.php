<?php
// productCard.php
function renderProductCard($name, $date, $title, $price, $description, $imageSrc) {
    echo "
    <div class='col-6'>
        <div class='card'>
            <div class='card-header d-flex justify-content-between align-items-center' style='padding: 5px 15px;'>
                <small class='text-truncate' style='font-size: 14px; max-width: 60%; color: #919191;'>$name</small>
                <small style='font-size: 12px; color: #919191;'>$date</small>
            </div>
            <div class='card-body' style='padding: 5px 15px;'>
                <h6 class='card-title text-truncate' style='font-size: 15px; color: #4c4c4d; '>$title</h6>
                <h6 style='font-size: 14px;'>Price: GHC $price</h6>
                <p class='description'>$description</p>
                <div class='imageupload'>
                    <img src='$imageSrc' alt='$title'>
                </div>
            </div>
            <div class='card-footer text-center'>
                <button class='btn' style='border: none; background: none; margin: 0 10px;'>
                    <i class='bi bi-cart-plus icon' aria-label='Add to cart'></i>
                </button>
                <button class='btn' style='border: none; background: none; margin: 0 10px;'>
                    <i class='bi bi-bookmark icon' aria-label='Bookmark'></i>
                </button>
                <button class='btn' style='border: none; background: none; margin: 0 10px;' data-bs-toggle='modal' data-bs-target='#contactmodal'>
                    <i class='bi bi-telephone icon' aria-label='Contact seller'></i>
                </button>
            </div>
        </div>
    </div>
    ";
}
?>
