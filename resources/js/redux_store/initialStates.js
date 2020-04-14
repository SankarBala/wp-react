import React from "react";
import { render, id, published_day, published_month, published_year } from "./../config";

const InitialStates = {
  user: { name: "guest", user_id: 0 },
  template: {
    render: render,
    id: id,
    published_day: published_day,
    published_month: published_month,
    published_year: published_year
  }
};

export default InitialStates;
