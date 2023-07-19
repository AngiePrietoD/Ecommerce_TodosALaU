import 'bootstrap';
import './bootstrap';
import { Toast } from 'bootstrap/dist/js/bootstrap.esm'

import { MultiFormatReader, BarcodeFormat, BrowserMultiFormatReader, NotFoundException } from '@zxing/library';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
/*
window.addEventListener('load', function () {

    Livewire.on('notifyMe', msg => {
        if (!("Notification" in window)) {
            alert(msg);
        } else if (Notification.permission === "granted") {
            const notification = new Notification(msg);
        } else if (Notification.permission !== "denied") {
            Notification.requestPermission().then((permission) => {
                if (permission === "granted") {
                    const notification = new Notification(msg);
                }
            });
        }
    });

    let selectedDeviceId;
    const codeReader = new BrowserMultiFormatReader()
    console.log('ZXing code reader initialized')
    codeReader.listVideoInputDevices()
      .then((videoInputDevices) => {
        const sourceSelect = document.getElementById('sourceSelect')
        selectedDeviceId = videoInputDevices[0].deviceId
        if (videoInputDevices.length >= 1) {
          videoInputDevices.forEach((element) => {
            const sourceOption = document.createElement('option')
            sourceOption.text = element.label
            sourceOption.value = element.deviceId
            //sourceSelect.appendChild(sourceOption)
          })
          
          sourceSelect.onchange = () => {
            selectedDeviceId = sourceSelect.value;
          };

          const sourceSelectPanel = document.getElementById('sourceSelectPanel')
          sourceSelectPanel.style.display = 'block'
        }

        document.getElementById('startButton').addEventListener('click', () => {
          codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
            if (result) {
              console.log(result)
              document.getElementById('result').textContent = result.text
            }
            if (err && !(err instanceof NotFoundException)) {
              console.error(err)
              document.getElementById('result').textContent = err
            }
          })
          console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
        })

        document.getElementById('resetButton').addEventListener('click', () => {
          codeReader.reset()
          document.getElementById('result').textContent = '';
          console.log('Reset.')
        })

      })
      .catch((err) => {
        console.error(err)
      })
  })
  */

  /* Aside & Navbar: dropdowns */

Array.from(document.getElementsByClassName('dropdown')).forEach(elA => {
  elA.addEventListener('click', e => {
    if (e.currentTarget.classList.contains('navbar-item')) {
      e.currentTarget.classList.toggle('active')
    } else {
      const dropdownIcon = e.currentTarget.getElementsByClassName('mdi')[1]

      e.currentTarget.parentNode.classList.toggle('active')
      dropdownIcon.classList.toggle('mdi-plus')
      dropdownIcon.classList.toggle('mdi-minus')
    }
  })
})

/* Aside Mobile toggle */

Array.from(document.getElementsByClassName('mobile-aside-button')).forEach(el => {
  el.addEventListener('click', e => {
    const dropdownIcon = e.currentTarget
        .getElementsByClassName('icon')[0]
        .getElementsByClassName('mdi')[0]

    document.documentElement.classList.toggle('aside-mobile-expanded')
    dropdownIcon.classList.toggle('mdi-forwardburger')
    dropdownIcon.classList.toggle('mdi-backburger')
  })
})

/* NavBar menu mobile toggle */

Array.from(document.getElementsByClassName('--jb-navbar-menu-toggle')).forEach(el => {
  el.addEventListener('click', e => {
    const dropdownIcon = e.currentTarget
        .getElementsByClassName('icon')[0]
        .getElementsByClassName('mdi')[0]

    document.getElementById(e.currentTarget.getAttribute('data-target')).classList.toggle('active')
    dropdownIcon.classList.toggle('mdi-dots-vertical')
    dropdownIcon.classList.toggle('mdi-close')
  })
})

/* Modal: open */

Array.from(document.getElementsByClassName('--jb-modal')).forEach(el => {
  el.addEventListener('click', e => {
    const modalTarget = e.currentTarget.getAttribute('data-target')

    document.getElementById(modalTarget).classList.add('active')
    document.documentElement.classList.add('clipped')
  })
});

/* Modal: close */

Array.from(document.getElementsByClassName('--jb-modal-close')).forEach(el => {
  el.addEventListener('click', e => {
    e.currentTarget.closest('.modal').classList.remove('active')
    document.documentElement.classList.remove('is-clipped')
  })
})

/* Notification dismiss */

Array.from(document.getElementsByClassName('--jb-notification-dismiss')).forEach(el => {
  el.addEventListener('click', e => {
    e.currentTarget.closest('.notification').classList.add('hidden')
  })
})
