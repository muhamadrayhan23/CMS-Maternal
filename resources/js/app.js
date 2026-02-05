import './bootstrap';

import Swal from 'sweetalert2'

window.Swal = Swal

//neutral
window.confirmEdit = function () {
    Swal.fire({
        title: 'Save the changes?',
        text: 'All the changes you made will be saved.',
        icon: 'question',
        showDenyButton: true,
        showCancelButton: true,

        confirmButtonText: 'Save',
        denyButtonText: "Don't Save",
        cancelButtonText: 'Cancel',

        confirmButtonColor: '#16a34a',
        denyButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
    }).then((result) => {

        if (result.isConfirmed) {
            document.getElementById('edit-form').submit()

        } else if (result.isDenied) {
            window.location.href = window.routes.homeLink
        }

    })
}

window.confirmBack = function () {
    Swal.fire({
        title: 'Are you sure?',
        text: 'All the changes you made will be unsaved.',
        icon: 'warning',
        showCancelButton: true,

        confirmButtonText: 'Leave page',
        cancelButtonText: 'Stay',

        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = window.routes.homeLink
        }
    })
}