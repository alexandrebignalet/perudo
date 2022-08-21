import React, { useMemo, useRef } from 'react';
import './App.css';
import { FirebaseRepository } from './perudo/infra/firebase.repository';
import { UserRepository } from './perudo/infra/user.repository';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import { PerudoRepository } from './perudo/infra/perudo.repository';
import { Home } from './components/Home';
import { Perudo } from './components/Perudo';
import { ToastContainer } from 'react-toastify';

import 'react-toastify/dist/ReactToastify.min.css';
import { UserService } from './perudo/infra/user.service';

function App() {

  const projectionRepository = useRef(new FirebaseRepository());
  const backEndUrl: string = useMemo(() => {
    const url = process.env.REACT_APP_BACK_END_URL;
    if (!url) throw new Error('back end url must be defined');
    return url;
  }, []);

  const perudoRepository = new PerudoRepository(backEndUrl);
  const userRepository = new UserRepository(backEndUrl);
  const userService = new UserService(userRepository);

  return (
        <div className="App">
            <ToastContainer
                position="top-right"
                autoClose={5000}
                hideProgressBar={false}
                newestOnTop={false}
                closeOnClick
                rtl={false}
                pauseOnFocusLoss
                draggable
                pauseOnHover
            />
            <h2>Perudo</h2>
            <Router>
                <Routes>
                    <Route path="/" element={
                        <Home
                            userService={userService}
                            perudoRepository={perudoRepository}
                            projectionRepository={projectionRepository.current}
                        />
                    }/>

                    <Route path="games">
                        <Route path=":id" element={
                            <Perudo perudoRepository={perudoRepository}
                                    projectionRepository={projectionRepository.current}
                                    userService={userService}
                            />
                        }/>
                    </Route>
                </Routes>
            </Router>
        </div>
  );
}

export default App;
