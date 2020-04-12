import React, { Component, Fragment } from "react";
import Header from "./header/Header";
import Nav from "./nav/Nav";
import Figure from "./figure/Figure";
import Footer from "./footer/Footer";

import mapStateToProps from "./../redux_store/mapStateToProps";
import mapDispatchtoProps from "./../redux_store/mapDispatchToProps";

const Index = () => {
  return (
    <div className="container">
      <Header />
      <Nav />
      <Figure />
      <Footer />
    </div>
  );
};

export default Index;
