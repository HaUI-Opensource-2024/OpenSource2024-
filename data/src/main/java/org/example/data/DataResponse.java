package org.example.data;

import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;


@Getter
@Setter
@AllArgsConstructor
@NoArgsConstructor
public class DataResponse {
    private int id;
    private String title;
    private boolean isPro;
    private String description;
    private String prompt;
    private String field;
}
