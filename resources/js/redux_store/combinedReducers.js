import { combineReducers } from "redux";
import TemplateReducer from './reducers/templateReducer';
import UserReducer from './reducers/userReducer';
import PageReducer from './reducers/pageReducer';
import ObjectReducer from './reducers/objectReducer';
import RouteReducer from './reducers/routeReducer';




const CombinedReducer = combineReducers({
  template: TemplateReducer,
  user: UserReducer,
  page: PageReducer,
  object: ObjectReducer,
  route: RouteReducer
});

export default CombinedReducer;
