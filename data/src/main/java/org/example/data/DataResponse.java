package org.example.data;

import com.fasterxml.jackson.annotation.JsonIgnore;
import com.fasterxml.jackson.annotation.JsonProperty;
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
    @JsonProperty(value = "is_pro")
    private boolean isPro;
    private String description;
    private String prompt;
    @JsonProperty(value = "fields")
    private String field;
}
