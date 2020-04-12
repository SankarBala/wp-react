import { combineReducers } from "redux";
import UserReducer from './reducers/userReducer';
import PageReducer from './reducers/pageReducer';
import ObjectReducer from './reducers/objectReducer';
import RouteReducer from './reducers/routeReducer';




const CombinedReducer = combineReducers({
  user: UserReducer,
  page: PageReducer,
  object: ObjectReducer,
  route: RouteReducer
});

export default CombinedReducer;
