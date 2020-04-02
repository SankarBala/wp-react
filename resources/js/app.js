import React, {Component, Fragment} from 'react';
import ReactDOM from 'react-dom';

class App extends Component {
    render(){
        return(
            <Fragment>
                Welcome to wordpress react theme.
            </Fragment>
        );
    }
 
}

ReactDOM.render(<App />, document.getElementById("root"));
