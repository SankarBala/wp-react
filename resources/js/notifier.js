import React from 'react';

const notify = (nid, name, body, ob, cb) => {
   
  Notification.requestPermission(function(status) {
    var option = {
      body: body || 'Body',
      icon: "/assets/images/icons/favicon.ico",
      vibrate: [1000, 500, 1000],
      data: { primayKey: nid || 'ID' },
      actions: [
        {
          action: "explore",
          title: ob || 'See details'
        },
        {
          action: "close",
          title: cb || 'Not interest'
        }
      ]
    };

    if (status === "granted") {
      navigator.serviceWorker.getRegistration().then(function(reg) {
        reg.showNotification(
          name || 'Name',
          option
        );
      });
    }
  });
};

export default notify;
