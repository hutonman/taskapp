import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import { Test } from './Test';

export const App = () => {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<Test />} />
            </Routes>
        </BrowserRouter>
    );
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
