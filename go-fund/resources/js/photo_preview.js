// // ... existing code ...

// var galleryPhotoUrls = []; // Store the URLs of gallery photos


// document.getElementById("addGalleryPhotoButton").addEventListener("click", function() {
//     addGalleryPhotoInput();
// });

// function addGalleryPhotoInput() {
//     var additionalInputsContainer = document.getElementById("additionalGalleryPhotoInputs");
//     var inputContainer = document.createElement("div");
//     inputContainer.classList.add("mb-3");

//     var inputLabel = document.createElement("label");
//     inputLabel.setAttribute("for", "gallery");
//     inputLabel.classList.add("form-label");
//     inputLabel.innerText = "Upload Another Gallery Photo";

//     var input = document.createElement("input");
//     input.setAttribute("type", "file");
//     input.setAttribute("name", "gallery[]");
//     input.classList.add("form-control");
//     input.setAttribute("multiple", ""); // Allow multiple image selection
//     input.addEventListener("change", function(event) {
//         console.log("Additional gallery photo change event fired!");

//         var newGalleryPhotoUrls = [];
//         for (var i = 0; i < event.target.files.length; i++) {
//             var newGalleryPhotoUrl = URL.createObjectURL(event.target.files[i]);
//             newGalleryPhotoUrls.push(newGalleryPhotoUrl);
//             var newGalleryPhotoPreview = document.createElement("div");
//             newGalleryPhotoPreview.innerHTML = `<img src="${newGalleryPhotoUrl}" alt="Gallery Photo" style="max-width: 300px;">`;
//             inputContainer.appendChild(newGalleryPhotoPreview);
//         }
//         galleryPhotoUrls = galleryPhotoUrls.concat(newGalleryPhotoUrls); // Add new URLs to the existing galleryPhotoUrls array
//         addGalleryPhotoInput();
//     });

//     inputContainer.appendChild(inputLabel);
//     inputContainer.appendChild(input);
//     additionalInputsContainer.appendChild(inputContainer);
// }
