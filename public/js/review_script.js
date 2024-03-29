// async adding of review
function addReview()
{
    document.getElementById("reviewButton").hidden = true;
    let place = document.getElementById("place-for-review");
    place.hidden = false;
}

window.onload = function () {
const reviewForm = document.getElementById('reviewForm');
if (reviewForm) {
    reviewForm.addEventListener('submit', async function (event) {
        // prevent the default form submit behavior
        event.preventDefault();

        document.getElementById("reviewButton").hidden = false;
        let place = document.getElementById("place-for-review");
        place.hidden = true;

        // create FormData object from form inputs
        const formData = new FormData(reviewForm);
        // send the form data to the server using fetch API
        const response = await fetch('?c=review&a=store', {
            method: 'POST',
            body: formData
        })

        const reviews = await response.json();
        reviews.reverse();
        //getting authors name
        const response2 = await fetch('?c=user&a=getUsers');
        const users = await response2.json();

        document.getElementById('body-reviews').innerHTML = '';

        reviews.forEach(function(x) {
            const newReview = document.createElement('div');
            newReview.classList.add("row");
            newReview.classList.add("d-flex");
            newReview.classList.add("justify-content-center")
            let usr = users.find(element => element.id === x.id_author);
            newReview.innerHTML =
                `<div class="col-md-10">
                 <div class="card">
                     <div class="card-body m-3">
                         <div class="row">
                             <div class="col-lg-4 d-flex jclassNamey-content-center align-items-center mb-4 mb-lg-0">
                                 <img src="./public/images/review_img.jpg"
                                       class="rounded-circle imclassNameid shadow-1" alt="woman avatar" width="200" height="200"/>
                            </div>
                           
                            <div class="col-lg-8">
                                <p class="text-muted fw-ligclassName-4"> ${x.text} </p>
                                <p class="fw-bold lead mb-2" >
                                <strong>${usr.first_name + " " +  usr.last_name}</strong>
                                </p>
                            </div>
                         </div>
                         
                         <!--<a href="?c=review&a=edit&id_review={x.id_review}"> <button type="submit" class="btn btn-outline-primary">Upraviť</button> </a>-->
                         <!--<a href="?c=review&a=delete&id_review={x.id_review}"> <button type="submit" class="btn btn-outline-danger">Odstraniť</button> </a>-->
                        <div class="edit-buttons">
                            <form class="buttonFrom" action="?c=review&a=edit" method="post">
                                <input type="hidden" name="id_review" value="${x.id_review}">
                                <button  type="submit" class="btn btn-outline-primary">Upraviť</button>
                            </form>
                           <button  class="btn btn-outline-danger"  onclick="deleteConfrimation(${x.id_review})" >Odstraniť</button>
                        </div>
                     </div>
                 </div>
            </div>`

            document.getElementById('body-reviews').appendChild(newReview);
        })

    });
}
}

//---delete confirmation
function deleteConfrimation(review) {
    const id = review;
    document.getElementById('delete-confrim').style.display = 'block';

    // Get the modal
    let modal = document.getElementById('delete-confrim');

    modal.onsubmit = function () {
        fetch(`?c=review&a=delete&id=${id}`, {
            method: 'DELETE'
        })
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
}
