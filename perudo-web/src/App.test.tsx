import React from 'react';
import { render, screen } from '@testing-library/react';
import App from './App';

test('renders perudo', () => {
  render(<App/>);
  const linkElement = screen.getByText(/perudo/i);
  expect(linkElement).toBeInTheDocument();
});
