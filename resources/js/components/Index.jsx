import React, { Component, Fragment } from "react";
import Header from './header/Header';
import Nav from './nav/Nav';
import Figure from './figure/Figure';

class Index extends Component {
  render() {
    return (
     <div className="container">
       <Header />
       <Nav />
       <Figure />
     </div>
    );
  }
}

export default Index;
