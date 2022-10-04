import { ENotificationType } from '@/typings/notification.types';

import Notification from '@/components/atoms/Notification/NotificationComponent.vue';

describe('NotificationComponent', () => {
    it('should render default slot', () => {
        cy.mount(Notification, {
            slots: { default: () => 'Content' },
            props: {
                type: ENotificationType.WARNING,
            },
        });

        cy.getTest('notification').should('have.text', 'Content');
    });

    describe('colors', () => {
        it('should be orange', () => {
            cy.mount(Notification, {
                slots: { default: () => 'Content' },
                props: {
                    type: ENotificationType.WARNING,
                },
            });

            cy.getTest('notification').should('have.class', 'bg-orange-50 text-orange-700 border-orange-300');
        });

        it('should be red', () => {
            cy.mount(Notification, {
                slots: { default: () => 'Content' },
                props: {
                    type: ENotificationType.DANGER,
                },
            });

            cy.getTest('notification').should('have.class', 'bg-red-50 text-red-600 border-red-300');
        });

        it('should be green', () => {
            cy.mount(Notification, {
                slots: { default: () => 'Content' },
                props: {
                    type: ENotificationType.SUCCESS,
                },
            });

            cy.getTest('notification').should('have.class', 'bg-green-50 text-green-700 border-green-300');
        });

        it('should be blue', () => {
            cy.mount(Notification, {
                slots: { default: () => 'Content' },
                props: {
                    type: ENotificationType.INFO,
                },
            });

            cy.getTest('notification').should('have.class', 'bg-blue-50 text-blue-500 border-blue-300');
        });
    });
});
