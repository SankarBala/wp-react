import React, { Component, Fragment } from "react";
import { restUrl } from "./../../config";
import axios from "axios";

class HeaderTop extends Component {
  constructor(props) {
    super(props);
    this.state = {
      topbarData: ""
    };
  }

  componentDidMount() {
    axios.get(restUrl + "sidebars/topbar/").then(data => {
      this.setState({
        topbarData: data.data.rendered
      });
    });
  }

  createMarkup(html) {
    return { __html: html };
  }

  render() {
    return (
      <div className="row headerTop">
        <div
          className="col-md-12 text-center text-md-right"
          dangerouslySetInnerHTML={this.createMarkup(this.state.topbarData)}
        />
      </div>
    );
  }
}

export default HeaderTop;
