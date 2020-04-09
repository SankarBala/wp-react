import React from "react";
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";

import config from './../../config';

export default function Figure() {
 
  return (
    <Router>
      <div>
        <nav>
          <ul>
            <li>
              <Link to={config.siteUrl+"/"}>home</Link>
            </li>
            <li>
              <Link to={config.siteUrl+"/about"}>About</Link>
            </li>
            <li>
              <Link to={config.siteUrl+"/user"}>Users</Link>
            </li>
          </ul>
        </nav>

        {/* A <Switch> looks through its children <Route>s and
            renders the first one that matches the current URL. */}
        <Switch>
          <Route exact path={config.siteUrl+"/"}>
            <About />
          </Route>
          <Route path={config.siteUrl+"/about"}>
            <Users />
          </Route>
          <Route path={config.siteUrl+"/user"}>
            <Home />
          </Route>
        </Switch>
      </div>
    </Router>
  );
}

function Home() {
  return <h2>Home</h2>;
}

function About() {
  return <h2>About</h2>;
}

function Users() {
  return <h2>Users</h2>;
}
