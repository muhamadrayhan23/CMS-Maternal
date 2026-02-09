import './bootstrap';

import Swal from 'sweetalert2'

window.Swal = Swal

//neutral
window.confirmEdit = function () {
    Swal.fire({
        title: 'Save the changes?',
        text: 'All the changes you made will be saved.',
        showDenyButton: true,
        showCancelButton: true,

        confirmButtonText: 'Save',
        denyButtonText: "Don't Save",
        cancelButtonText: 'Cancel',

        confirmButtonColor: '#16a34a',
        denyButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',

        customClass: {
        // Kontainer Utama
            popup: 'rounded-[8rem] !p-10 shadow-2xl border-none min-w-[90%] md:min-w-[550px] !items-start',
            title: '!text-left !text-3xl font-bold text-gray-900 w-full !justify-start !flex !p-0 !m-0 !mb-5',
            htmlContainer: '!text-left !text-gray-500 !text-lg w-full !m-0 !mb-10 !justify-start !flex !p-0',

            actions: 'flex w-full !justify-between gap-4 px-4 w-full !m-0 !p-0',

            confirmButton: 'flex-1 !bg-[#16a34a] !text-white !px-6 !py-3 !rounded-lg !font-bold !text-base hover:!bg-green-700 transition-all !m-0 !outline-none !shadow-none',
            cancelButton: 'flex-1 bg-[#111111] !text-white !px-6 !py-3 !rounded-lg !font-bold !text-base hover:!bg-gray-700 transition-all !m-0 !outline-none !shadow-none',
            closeButton: 'focus:!outline-none focus:!ring-0 !border-none !text-gray-400'
                },
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
        showCancelButton: true,

        confirmButtonText: 'Leave page',
        cancelButtonText: 'Stay',

        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        
        customClass: {
        // Kontainer Utama
            popup: 'rounded-[8rem] !p-10 shadow-2xl border-none min-w-[90%] md:min-w-[550px] !items-start',
            title: '!text-left !text-3xl font-bold text-gray-900 w-full !justify-start !flex !p-0 !m-0 !mb-5',
            htmlContainer: '!text-left !text-gray-500 !text-lg w-full !m-0 !mb-10 !justify-start !flex !p-0',

            actions: 'flex w-full !justify-between gap-4 px-4 w-full !m-0 !p-0',

            confirmButton: 'flex-1 bg-[#111111] !text-white !px-6 !py-3 !rounded-lg !font-bold !text-base hover:!bg-red-700 transition-all !m-0 !outline-none !shadow-none',
            cancelButton: 'flex-1 bg-[#111111] !text-white !px-6 !py-3 !rounded-lg !font-bold !text-base hover:!bg-gray-700 transition-all !m-0 !outline-none !shadow-none',
            closeButton: 'focus:!outline-none focus:!ring-0 !border-none !text-gray-400'
        },
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = window.routes.homeLink
        }
    })
}
