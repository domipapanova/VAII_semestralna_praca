function addReview() {
    document.getElementById("reviewButton").hidden = true;
    let place = document.getElementById("place-for-review");
    place.hidden = false;
}

async function refreshReviews() {
    let response;
    //getting data from database
    response = await fetch("?c=review&a=getReviews");

    const reviews = await response.json();

    document.getElementById('body-reviews').innerHTML = '';

    for (const x of reviews) {
        const newReview = document.createElement('div');
        newReview.classList.add('row d-flex justify-content-center');

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
                                <p class="text-muted fw-ligclassName-4">${x.getText()} </p>
                                <p class="fw-bold lead mb-2" >
                                <strong> ${x.getName()}</strong>
                                </p>
                            </div>
                         </div>
                     </div>
                 </div>
            </div>`

        document.getElementById('body-reviews').appendChild(newReview);
    }


}